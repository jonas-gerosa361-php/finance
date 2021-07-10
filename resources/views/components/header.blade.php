@push('css')
    <link rel="stylesheet" href="/assets/css/header.css">
@endpush
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="header container-fluid">
    <a class="navbar-brand" href="/">Minhas Finanças</a>
    <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a href="/accounts" class="nav-link">Contas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/bills/create">Cadastrar Despesa</a>
        </li>
        <li class="nav-item">
            <a href="/incomes/create" class="nav-link">Cadastrar Receita</a>
        </li>
        <li class="nav-item">
            <a href="/categories" class="nav-link">Categorias</a>
        </li>
      </ul>
    </div>
  </div>
</nav>