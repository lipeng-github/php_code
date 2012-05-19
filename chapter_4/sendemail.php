<?php
 if(isset($_POST['submit']))
 {	 
  $from = '825015728@qq.com';
  $subject = $_POST['subject'];
  $text = $_POST['elvisemail'];
  $output_form = false;

  if((!empty($subject)) && (!empty($text)))
  {
	  $dbc = mysqli_connect('localhost', 'lipeng', '123', 'elvis_store')
	      or die('Error connecting to MySQL server.');
      $query = "SELECT * FROM email_list";
      $result = mysqli_query($dbc, $query)
	      or die('Error querying database.');

      while($row = mysqli_fetch_array($result))
      {
	      $first_name = $row['first_name'];
	      $last_name = $row['last_name'];

	      $msg = "Dear $first_name $last_name,\n $text.";
	      $to = $row['email'];
	      mail($to, $subject, $msg, 'From:'.$from);
	      echo 'Email sent to:'.$to.'<br />';
      } 
      mysqli_close($dbc);
  }
  if((!empty($subject)) && (empty($text)))
  {
	  echo 'You forgot the email body text.<br />';
	  $output_form = true;
  } 
  if((empty($subject) && (!empty($text))))
  { 
	  echo 'You forgot the email subject.<br />';    
	  $output_form = true;
  }
  if(empty($subject) && empty($text))
  {
	  echo 'You forgot the email subject and body text.<br />';  		
	  $output_form = true;
  }
 }
 else
 {
	 $output_form = true; #如果表单从未提交，那么肯定需要显示表单
 }
  if($output_form) #为了避免重复输入表单代码，增加了新的变量$output_form
  {
?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; #使用$_SERVER['PHP_SELF']超级全局变量可以自引用?>">
	<label for="subject">Subject of email:</label><br />
		<input type="text" id="subject" name="subject" value="<?php echo $subject; ?>" size="60" /><br />
	<label for="elvisemail">Body of email:</label><br />
	<textarea id="elvisemail" name="elvisemail" rows="8" cols="60">
      <?php echo $text; #对于一个文本区输入域，要把这个粘性数据回显输出在<textarea>和</textarea>之间，而不是使用value属性.?></textarea><br /> 
	<input type="submit" name="submit" value="Submit" />
  </form>  
<?php
  }
?>
