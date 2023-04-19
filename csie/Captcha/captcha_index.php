<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>php圖形驗證碼</title>
   
    <script>
        function refresh_code(){ 
            document.getElementById("imgcode").src="captcha.php"; 
		}
		function verifyCallback(token) {
			var formData = new FormData();
			formData.append('token', token);
			formData.append('ip', ip);
				
			// Google Apps Script 部署為網路應用程式後取得的 URL
			var uriGAS = "xxxxxxxxxxxx";
				
			fetch(uriGAS, {
				method: "POST",
				body: formData
			}).then(response => response.json())
				.then(result => {
				if(result.success) {
					// 後端驗證成功，success 會是 true
					// 這邊寫驗證成功後要做的事
				} else {
					// success 為 false 時，代表驗證失敗，error-codes 會告知原因
					window.alert(result['error-codes'][0])
				}
				})
				.catch(err => {
					window.alert(err)
				})
		}
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <html>
	<head>
		<meta charset="utf-8">
		<title>會員申請</title>
		<style>
			#pchange {
				position: fixed;
				bottom: 0;
				left: 77%;
				text-decoration: none;
				text-align: center;
				font-size: 20;
				color: black;
				font-family: "Microsoft YaHei";
				background-repeat: no-repeat;
				background-size: 331px 439px;
			}
		</style>
	</head>
	<body>
		<center>
		<div style="background-color:#000000"><h1 style="color:#FFFFFF"; ><br>會員登入<br><br></h1></div>
		<form name="form1" method="post" action="./checkcode.php">
			帳號:
				<input type="text" name="uid"><br><br>
			密碼:
				<input type="password" name="pid"><br><br>
			<p>請輸入下圖字樣：</p><p><img id="imgcode" src="captcha.php" onclick="refresh_code()" /><br />
			點擊圖片可以更換驗證碼
			</p>
			<input type="test" name="checkword" size="10" maxlength=""10/>
			<br><br>
			<div
				class="g-recaptcha"
				data-sitekey="6LczXg8gAAAAANgKdNebIH1myjjZejNkVmFuA4o9"
				data-theme="dark" data-size="normal"
				data-callback="verify"
				data-expired-callback="expired"
				data-error-callback="verifyCallback">
			</div>
            <br><br>
			<input type="submit" name="Submit" value="送出">
		</form>
		<center>
		<a href="../index.php"><div id="pchange" style="width:331px; height:439px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp回到首頁</div></a>
	</body>
</html>