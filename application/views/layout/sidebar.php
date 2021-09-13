<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">OS - WEB  <sup>X</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/') ?>">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapseTwo">
         <i class="fas fa-dollar-sign"></i>
            <span>O.S. & Vendas</span>
        </a>
        <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Vendas</h6>
                <a class="collapse-item" href="<?= base_url('os') ?>"> <i class="fas fa-shopping-basket"></i> &nbsp;&nbsp; O.S.</a>
                <a class="collapse-item" href="<?= base_url('vendas') ?>"><i class="fas fa-cart-arrow-down"></i> &nbsp;&nbsp; Vendas</a>

            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-database"></i>
            <span>Cadastros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cadastros no Sistema</h6>
                <a class="collapse-item" href="<?= base_url('clientes') ?>"> <i class="fas fa-user-tie"></i> &nbsp;&nbsp; Clientes</a>
                <a class="collapse-item" href="<?= base_url('fornecedores') ?>"> <i class="fas fa-user-secret"></i> &nbsp;&nbsp; Fornecedores</a>
                <a class="collapse-item" href="<?= base_url('vendedores') ?>"> <i class="fas fa-users-cog"></i> &nbsp;&nbsp; Tecnicos</a>
                <a class="collapse-item" href="<?= base_url('servicos') ?>"> <i class="fas fa-tools"></i> &nbsp;&nbsp; Serviços</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
            <i class="fas fa-toolbox"></i>
            <span>Estoque</span>
        </a>
        <div id="collapseTree" class="collapse" aria-labelledby="headingTree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Estoque</h6>
                <a class="collapse-item" href="<?= base_url('marcas') ?>"> <i class="fas fa-bars"></i> &nbsp;&nbsp; Marcas</a>
                <a class="collapse-item" href="<?= base_url('categorias') ?>"> <i class="fas fa-equals"></i> &nbsp;&nbsp; Categorias</a>
                 <a class="collapse-item" href="<?= base_url('produtos') ?>"> <i class="fas fa-cart-arrow-down"></i> &nbsp;&nbsp; Produtos</a>
            </div>
        </div>
    </li>
    
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
           <i class="fas fa-dollar-sign"></i>
            <span>Financeiro</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Financeiro</h6>
                <a class="collapse-item" href="<?= base_url('pagar') ?>"> <i class="fas fa-wallet"></i> &nbsp;&nbsp; Contas a Pagar</a>
                <a class="collapse-item" href="<?= base_url('receber') ?>"> <i class="fas fa-file-invoice-dollar"></i> &nbsp;&nbsp; Contas a Receber</a>
                <a class="collapse-item" href="<?= base_url('pagamentos') ?>"> <i class="fas fa-comments-dollar"></i> &nbsp;&nbsp; Formas Pagamento</a> 
            </div>
        </div>
    </li>

>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Config
    </div>


    <!-- Nav Item usuarios -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('usuarios') ?>">
            <i class="fas fa-users"></i>
            <span>Usuários</span></a>
    </li>



    <!-- Nav Item usuarios -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('sistema') ?>">
            <i class="fas fa-cogs"></i>
            <span>Sistema</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
