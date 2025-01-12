<?php include "include.php"; 
  session_start();
  if(!isset($_SESSION['loggedin'])){
   echo $navbar;
}elseif ($_SESSION['loggedin'] = '1'){ include 'loggedinnavbar.php'; }
   
?>

<main class="container">
  <br>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item active" aria-current="page">
        Forum
      </li>
    </ol>
  </nav>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Topics</h6>
    <div class="d-flex text-body-secondary pt-3">
      <a href="topic.aspx?id=1" style="text-decoration:none; color: #585c5e;">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
        <div class="border-bottom">
      <p style="margin-left: 40px; margin-top: -35px;" class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark">Discussion</strong>
        Talk about anything related to Melvin!
      </p>
      </div>
      </a>
    </div>
    <div class="d-flex text-body-secondary pt-3">
      <a href="topic.aspx?id=2" style="text-decoration:none; color: #585c5e;">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
      <div class="border-bottom">
      <p style="margin-left: 40px; margin-top: -35px;" class="pb-3 mb-0 small lh-sm">
      <strong class="d-block text-gray-dark">Off Topic</strong>
      Talk about anything.
      </p>
      </div>
      </a>
    </div>
    <div class="d-flex text-body-secondary pt-3">
      <a href="topic.aspx?id=3" style="text-decoration:none; color: #585c5e;">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
      <div class="border-bottom">
      <p style="margin-left: 40px; margin-top: -35px;" class="pb-3 mb-0 small lh-sm">
      <strong class="d-block text-gray-dark">Support</strong>
      Need help with anything? Post anything you need help with.
      </p>
      </div>
      </a>
    </div>
  </div>
</main>
<?php echo $footer; ?>