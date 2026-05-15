<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;
use App\Services\TransactionService;

class HomeController
{
  // private TemplateEngine $view;
  public function __construct(
    private TemplateEngine $view,
    private TransactionService $transactionService
  ) {
    // $this->view = new TemplateEngine(Paths::VIEW);
    // var_dump($this->view);
  }
  public function home()
  {
    $page = $_GET['p'] ?? 1;
    $page = (int) $page;
    $limit = 5;
    $offset = ($page - 1) * $limit;
    $searchTerm = $_GET['s'] ?? null;


    [$transactions, $count] = $this->transactionService->getUserTransactions($limit, $offset);

    $lastPage = ceil($count / $limit);
    $pages = $lastPage ? range(1, $lastPage) : [];

    $pageLinks = array_map(
      fn($page) => http_build_query(['p' => $page, 's' => $searchTerm]),
      $pages
    );



    return $this->view->render(
      'index.php',
      [
        'transactions' => $transactions,
        'currentPage' => $page,
        'previousPageQuery' => http_build_query([
          'p' => $page - 1,
          's' => $searchTerm,
        ]),
        'lastPage' => $lastPage,
        'nextPageQuery' => http_build_query([
          'p' => $page + 1,
          's' => $searchTerm
        ]),
        'pageLinks' => $pageLinks,
        'searchTerm' => $searchTerm
      ]
    );
  }
}
