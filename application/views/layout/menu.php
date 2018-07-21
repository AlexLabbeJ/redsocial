<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
	<div class="container">
	   <a class="navbar-brand" href="<?= base_url();?>">RedSocial</a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	   <span class="navbar-toggler-icon"></span>
	   </button>
	   <div class="collapse navbar-collapse" id="navbarSupportedContent">
	   	<form class="form-inline my-2 my-lg-0" style="margin-left: 50px;">
	      <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Buscar...">
	    </form>
	      <ul class="navbar-nav ml-auto">
	         <li class="nav-item <?php if($menu=="inicio"){ echo "active"; }?>">
	            <a class="nav-link" href="<?= base_url();?>"> <span class="sr-only">(current)</span><i class="fas fa-home"></i></a>
	         </li>
	         <li class="nav-item <?php if($menu=="perfil"){ echo "active"; }?>">
	            <a class="nav-link" href="<?= base_url();?>usuarios/perfil/<?= $this->session->userdata("nomUser");?>"><i class="fas fa-user"></i></a>
	         </li>
	         <li class="nav-item">
	         	<a class="nav-link" href="#"><i class="fa fa-comments"></i></a>
	         </li>
	         <li class="nav-item">
	         	<a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
	         </li>
	         <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <i class="fas fa-sliders-h"></i>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Configuración</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="<?= base_url();?>usuarios/logout"><i class="fas fa-sign-out-alt"></i> Salir</a>
		        </div>
		      </li>
	      </ul>
	   </div>
	</div>
</nav>