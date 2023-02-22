<?php
/******************************************************
*******************************************************
****************** PHPHUNT SCRIPTS ********************
*************  https://www.phphunt.com   **************
**** This software is distributed free of charge. *****
******** for coding projects: utasar@icloud.com *******
*******************************************************
******************************************************/
include('functions.php');
if(isset($_POST['submit'])){
	$keywords = suggestions($_POST['keywords'],$_POST['localization']);
}
?>
<!doctype html>
<html lang="tr" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
	<title>Google Suggestions</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">Google Suggestions</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link active" href="./">Home</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<main class="flex-shrink-0">
	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<form action="" method="post">
					<div class="mb-3">
						<label for="keywords" class="form-label">Keyword:</label>
						<input type="text" class="form-control" id="keywords" name="keywords" placeholder="enter keyword">
					</div>
					<div class="mb-3">
						<label for="localization" class="form-label">Locale:</label>
						<select class="form-select" name="localization">
						<?php foreach(locales() as $localesKey => $localesVal): ?>
						<option value="<?php echo $localesKey; ?>" <?php if($localesKey == 'en-US'){echo 'selected';} ?>><?php echo $localesVal; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="mb-3">
						<?php if(isset($keywords)): ?>
						<?php if(!empty($keywords)): ?>
						<div class="alert alert-success" role="alert">
							<b>Suggested keywords:</b><br>
							<?php foreach($keywords as $keywordsVal): ?>
							<?php echo $keywordsVal; ?><br>
							<?php endforeach; ?>
						</div>
						<?php else: ?>
						<div class="alert alert-danger" role="alert">
							<b>no result</b>
						</div>
						<?php endif; ?>
						<?php endif; ?>
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<footer class="footer mt-auto py-3 bg-light">
	<div class="container">
		<span class="text-muted small"><a href="https://phphunt.com" target="_blank" class="link-dark">php scripts</a></span>
	</div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>