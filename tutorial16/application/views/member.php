<title>Employees Details</title>
<head>
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=base_url('Users/logout'); ?>">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<head>
<style>
#logout{
	float:right;
}
#login{
	float:right;
}

</style>
<div class="container-fluid col-lg-11">
	<?php if($this->session->flashdata('errno'))
		{?>
		<strong>
			<div class="form-group" style="color:green;">
			<?=$this->session->flashdata('message') ?>
			</div>
		</strong>
		<?php } ?>
	<h2>Employee Details</h2>
	<?php echo anchor('Member/form', 'Add New User', 'class="btn btn-primary btn-lg"')?>
	</br>
	<form class="form-inline my-2 my-lg-0" id="login">
      <strong class="text-primary">
            User logged in: 
            <?php
              $this->load->library('session');
              if($this->session->has_userdata('username'))
              {
                echo $this->session->userdata('username');
              }
            ?>
      </strong> 
    </form>
	</br>
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">Sr.No.</th>
	      <th scope="col">Full Name</th>
	      <th scope="col">First Name</th>
	      <th scope="col">Last Name</th>
		   <th scope="col">Email</th>
		   <th scope="col">Password</th>
		   <th scope="col">Contact</th>
		   <th scope="col">Birthdate</th>
		   <th scope="col">Gender</th>
		   <th scope="col">Pass No.</th>
		   <th scope="col">Register By</th>
		   <th scope="col">Status</th>
		   <th scope="col">Photo</th>
		   <th scope="col">Time Stamp</th>
		    <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  		if(count($memberdata)):
	  	?>
	  	<?php
	  			foreach($memberdata as $row):
	  	?>
	    <tr class="table-active">
	      <th><?php echo $row['id']; ?></th>
	      <td><?php echo $row['fullname']; ?></td>
	      <td><?php echo $row['firstname']; ?></td>
	      <td><?php echo $row['lastname']; ?></td>
	      <td><?php echo $row['email']; ?></td>
	      <td><?php echo $row['password']; ?></td>
	      <td><?php echo $row['contact']; ?></td>
	      <td><?php echo $row['birthday']; ?></td>
	      <td><?php echo $row['gender']; ?></td>
	      <td><?php echo $row['passno']; ?></td>
	      <td><?php echo $row['registerby']; ?></td>
	      <td><?php echo $row['status']; ?></td>
	       <td><img  style='border-radius:50%' height="100" width="120" src="<?php echo base_url();?>image/<?php echo $row['photo']; ?>"></td>
	      <td><?php echo $row['timestemp']; ?></td>
	      <td>
			<pre><?php echo anchor("Member/form/{$row['id']}",'Edit','class="btn btn-success"')?>  <?php echo anchor("Member/delete/{$row['id']}",'Delete','class="btn btn-danger"')?></pre>
		  </td>
	    </tr>
	    <?php
	    		endforeach;
	    ?>
	    <?php
	    	else:
	    ?>
		    	<tr>
		    		<td>No Records Found</td>
		    	</tr>
	    <?php
	    	endif;
	    ?>
		
	   </tbody>
	</table>
</div>
