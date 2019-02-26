<!-- Reset Password Email -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="styles.css" media="all" rel="stylesheet" type="text/css" />
		<style>
			/* -------------------------------------
				GLOBAL
			------------------------------------- */
			* {
			margin: 0;
			padding: 0;
			font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			box-sizing: border-box;
			font-size: 14px;
			}

			img {
			max-width: 100%;
			}

			body {
			-webkit-font-smoothing: antialiased;
			-webkit-text-size-adjust: none;
			width: 100% !important;
			height: 100%;
			line-height: 1.6;
			}

			/* Let's make sure all tables have defaults */
			table td {
			vertical-align: top;
			}

			/* -------------------------------------
				BODY & CONTAINER
			------------------------------------- */
			body {
			background-color: #f6f6f6;
			}

			.body-wrap {
			background-color: #f6f6f6;
			width: 100%;
			}

			.container {
			display: block !important;
			max-width: 800px !important;
			margin: 0 auto !important;
			/* makes it centered */
			clear: both !important;
			}

			.content {
			max-width: 800px;
			margin: 0 auto;
			display: block;
			padding: 20px;
			}

			/* -------------------------------------
				HEADER, FOOTER, MAIN
			------------------------------------- */
			.main {
			background: #fff;
			border: 1px solid #e9e9e9;
			border-radius: 3px;
			}

			.content-wrap {
			padding: 20px;
			}

			.content-block {
			padding: 0 0 20px;
			}

			.header {
			width: 100%;
			margin-bottom: 20px;
			}

			.footer {
			width: 100%;
			clear: both;
			color: #999;
			padding: 20px;
			}
			.footer a {
			color: #999;
			}
			.footer p, .footer a, .footer unsubscribe, .footer td {
			font-size: 12px;
			}

			/* -------------------------------------
				GRID AND COLUMNS
			------------------------------------- */
			.column-left {
			float: left;
			width: 50%;
			}

			.column-right {
			float: left;
			width: 50%;
			}

			/* -------------------------------------
				TYPOGRAPHY
			------------------------------------- */
			h1, h2, h3 {
			font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			color: #000;
			margin: 40px 0 0;
			line-height: 1.2;
			font-weight: 400;
			}

			h1 {
			font-size: 32px;
			font-weight: 500;
			}

			h2 {
			font-size: 24px;
			}

			h3 {
			font-size: 18px;
			}

			h4 {
			font-size: 14px;
			font-weight: 600;
			}

			p, ul, ol {
			margin-bottom: 10px;
			font-weight: normal;
			}
			p li, ul li, ol li {
			margin-left: 5px;
			list-style-position: inside;
			}

			/* -------------------------------------
				LINKS & BUTTONS
			------------------------------------- */
			a {
			color: #348eda;
			text-decoration: underline;
			}

			.btn-primary {
			text-decoration: none;
			color: #FFF;
			background-color: #8340E6;
			border: solid #8340E6;
			border-width: 10px 20px;
			line-height: 2;
			font-weight: bold;
			text-align: center;
			cursor: pointer;
			display: inline-block;
			border-radius: 5px;
			text-transform: capitalize;
			}

			/* -------------------------------------
				OTHER STYLES THAT MIGHT BE USEFUL
			------------------------------------- */
			.last {
			margin-bottom: 0;
			}

			.first {
			margin-top: 0;
			}

			.padding {
			padding: 10px 0;
			}

			.aligncenter {
			text-align: center;
			}

			.alignright {
			text-align: right;
			}

			.alignleft {
			text-align: left;
			}

			.clear {
			clear: both;
			}

			/* -------------------------------------
				Alerts
			------------------------------------- */
			.alert {
			font-size: 16px;
			color: #fff;
			font-weight: 500;
			padding: 20px;
			text-align: center;
			border-radius: 3px 3px 0 0;
			}
			.alert a {
			color: #fff;
			text-decoration: none;
			font-weight: 500;
			font-size: 16px;
			}
			.alert.alert-warning {
			background: #ff9f00;
			}
			.alert.alert-bad {
			background: #d0021b;
			}
			.alert.alert-good {
			background: #8340E6;
			}

			/* -------------------------------------
				INVOICE
			------------------------------------- */
			.invoice {
			margin: 40px auto;
			text-align: left;
			width: 80%;
			}
			.invoice td {
			padding: 5px 0;
			}
			.invoice .invoice-items {
			width: 100%;
			}
			.invoice .invoice-items td {
			border-top: #eee 1px solid;
			}
			.invoice .invoice-items .total td {
			border-top: 2px solid #333;
			border-bottom: 2px solid #333;
			font-weight: 700;
			}

			/* -------------------------------------
				RESPONSIVE AND MOBILE FRIENDLY STYLES
			------------------------------------- */
			@media only screen and (max-width: 640px) {
				h1, h2, h3, h4 {
					font-weight: 600 !important;
					margin: 20px 0 5px !important;
				}

				h1 {
					font-size: 22px !important;
				}

				h2 {
					font-size: 18px !important;
				}

				h3 {
					font-size: 16px !important;
				}

				.container {
					width: 100% !important;
				}

				.content, .content-wrapper {
					padding: 10px !important;
				}

				.invoice {
					width: 100% !important;
				}
			}
		</style>
	</head>

	<body>
		<table class="body-wrap">
		<tr>
			<td></td>
			<td class="container" width="700">
				<div class="content">
					<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="alert alert-good">
							Reset Password
						</td>
					</tr>
					<tr>
						<td class="content-wrap">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td class="content-block">
									<p><b>Hello!</b></p>
									<p>You are receiving this email because we received a password reset request for your account.</p>
								</td>
							</tr>
							<tr>
								<td class="content-block">
									<p>Just copy and paste the following token in app's reset password form:</p>
									<p><b>{{ $token }}</b></p>
								</td>
							</tr>
							<tr>
								<td class="content-block">
									<p>If you did not request a password reset, no further action is required.</p>
								</td>
							</tr>
							<tr>
								<td class="content-block">
									<p>
										<b>Appetiser</b>
									</p>
								</td>
							</tr>
						</table>
						</td>
					</tr>
					</table>
				</div>
			</td>
			<td></td>
		</tr>
		</table>
	</body>
</html>
