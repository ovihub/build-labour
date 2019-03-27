<!-- Reset Password Email -->
@extends('emails.layout')

@section('content')
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
									<p> <b>Hi <?php echo $user->first_name ?></b> </p>
									<p>You are receiving this email because we received a password reset request for your account.</p>
								</td>
							</tr>
							<tr>
								<td class="content-block">
									<p>Just click the following link to reset your password:</p>
                                    <p><b><a href="{{ url('/password/reset?token=') . $token  }}">Reset Password</a></b></p>
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
										<b><?php echo env( 'APP_NAME' ) ?></b>
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
@endsection