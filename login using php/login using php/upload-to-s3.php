<?php
require 'vendor/autoload.php';
include ("connection.php");
	


	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	// AWS Info
	$bucketName = 'moodlemini';
	$IAM_KEY = 'AKIAXPJNFJ6ONCHSQ5Z6';
	$IAM_SECRET = '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';

	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'ap-south-1'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}
	
	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	$keyName = 'test_example/' . basename($_FILES["uploadfile"]['name']);
	$pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;

	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["uploadfile"]['tmp_name'];

		$result=$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				
				'ACL'=> "public-read",
			)
		);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}

	$url= $result->get('ObjectURL');
	

	if(isset($_POST['submit'])){
		$subjectname=$_POST['subjectTitle'];
		$filename=$_POST['filename'];
		$objecturl=$url;
		$sql="insert into files (subjectname,filename,fileurl) values ('$subjectname','$filename','$objecturl')";
		$query=mysqli_query($con,$sql);
		
	}
	header("Location: pdfupload.php");

	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.
?>