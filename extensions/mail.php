<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
require 'sendgrid-php/sendgrid-php.php';

use SendGrid\Mail\Mail;
$remitente = "keygenerator@rdssoft.com.co";
$destinatario = "ltoncel1@hotmail.com";
$email = new Mail();
$email->setFrom($remitente, "Soporte WIS By RDS Ingeniería");
$email->setSubject("Se ha creado un usuario en WIS (Web Information Siystem)");
$email->addTo($destinatario, "LUIS TONCEL");
$email->addContent("text/plain", 
"Hola: Luis Carlos Toncel Oliveros; Se ha creado un usuario para que tenga acceso al sistema.
Los datos de autenticación los encontraras a continuación.
Tu usuario: 72295936
Validación de usuario:
Para validar su usuario debe ingresar la fecha de expedición de su documento de identidad.
Contraseña:
Haga clic en Acceder para configurar su contraseña y poder ingresar. Para mantener la cuenta protegida, siga estos lineamientos para las contraseñas.
<El botón de acceso aparece aquí>

Saludos,
El equipo de desarrollo WIS (Web Information System)

<img>
© 2021 WIS, Colombia
Este mensaje es un anuncio de servicio obligatorio por correo electrónico que tiene como fin ponerlo al tanto de los cambios importantes implementados en su cuenta de WIS."
);
$email->addContent(
    'text/html', 
    '
    <table
			style="
				margin: 0;
				background: #f8f9fa !important;
				border-collapse: collapse;
				border-spacing: 0;
				color: #3c4043;
				font-family: Roboto, Helvetica, Arial, sans-serif;
				font-size: 14px;
				font-weight: 400;
				height: 100%;
				line-height: inherit;
				margin: 0;
				padding: 0;
				vertical-align: top;
				width: 100%;
				text-align: left;
			"
		>
			<tbody>
				<tr style="padding: 0; vertical-align: top">
					<td
						align="center"
						valign="top"
						style="
							margin: 0;
							border-collapse: collapse !important;
							color: #3c4043;
							font-family: Roboto, Helvetica, Arial, sans-serif;
							font-size: 14px;
							font-weight: 400;
							line-height: inherit;
							margin: 0;
							padding: 0;
							vertical-align: top;
							word-wrap: keep-all;
						"
					>
						<center style="min-width: 600px; width: 100%">
							<table
								align="center"
								style="
									margin: 0 auto;
									background: #fafafa;
									border-collapse: collapse;
									border-spacing: 0;
									float: none;
									margin: 0 auto;
									padding: 0;
									text-align: left;
									vertical-align: top;
									width: 600px;
								"
							>
								<tbody>
									<tr style="padding: 0; vertical-align: top">
										<td
											style="
												margin: 0;
												border-collapse: collapse !important;
												color: #3c4043;
												font-family: Roboto, Helvetica, Arial, sans-serif;
												font-size: 14px;
												font-weight: 400;
												line-height: inherit;
												margin: 0;
												padding: 0;
												vertical-align: top;
												word-wrap: keep-all;
											"
										>
											<table
												style="
													background: #f8f9fa;
													border-collapse: collapse;
													border-spacing: 0;
													display: table;
													font-size: 12px;
													padding: 0;
													vertical-align: top;
													width: 100%;
												"
											>
												<tbody>
													<tr style="padding: 0; vertical-align: top">
														<th
															style="
																margin: 0 auto;
																color: #3c4043;
																font-family: Roboto, Helvetica, Arial,
																	sans-serif;
																font-size: 14px;
																font-weight: 400;
																line-height: inherit;
																margin: 0 auto;
																padding: 0;
																padding-bottom: 24px;
																padding-left: 40px;
																padding-right: 40px;
																padding-top: 12px;
																width: 560px;
															"
														>
															<table
																style="
																	border-collapse: collapse;
																	border-spacing: 0;
																	margin-bottom: 0;
																	padding: 0;
																	vertical-align: top;
																	width: 100%;
																"
															>
																<tbody>
																	<tr style="padding: 0; vertical-align: top">
																		<th
																			style="
																				margin: 0;
																				color: #3c4043;
																				font-family: Roboto, Helvetica, Arial,
																					sans-serif;
																				font-size: 14px;
																				font-weight: 400;
																				line-height: inherit;
																				margin: 0;
																				padding: 0;
																				text-align: left;
																			"
																		>
																			<img
																				src="http://www.rdssoft.com.co/img/logo-wis.png"
																				alt="wis"
																				style="
																					clear: both;
																					display: block;
																					margin-top: 24px;
																					max-width: 100%;
																					outline: 0;
																					text-decoration: none;
																					width: 40%;
																				"
																				class="CToWUd"
																			/>
																		</th>
																		<th
																			style="
																				margin: 0;
																				color: #3c4043;
																				font-family: Roboto, Helvetica, Arial,
																					sans-serif;
																				font-size: 14px;
																				font-weight: 400;
																				line-height: inherit;
																				margin: 0;
																				padding: 0 !important;
																				width: 0;
																			"
																		></th>
																	</tr>
																</tbody>
															</table>
														</th>
													</tr>
												</tbody>
											</table>

											<table
												style="
													background: #fff;
													border-collapse: collapse;
													border-color: #e8eaed;
													border-spacing: 0;
													border-style: solid;
													border-width: 1px;
													display: table;
													padding: 0;
													vertical-align: top;
													width: 100%;
												"
											>
												<tbody>
													<tr style="padding: 0; vertical-align: top">
														<th
															style="
																margin: 0 auto;
																color: #3c4043;
																font-family: Roboto, Helvetica, Arial,
																	sans-serif;
																font-size: 14px;
																font-weight: 400;
																line-height: inherit;
																margin: 0 auto;
																padding: 0;
																padding-bottom: 0;
																padding-left: 40px;
																padding-right: 40px;
																width: 560px;
															"
														>
															<table
																style="
																	border-collapse: collapse;
																	border-spacing: 0;
																	padding: 0;
																	vertical-align: top;
																	width: 100%;
																"
															>
																<tbody>
																	<tr style="padding: 0; vertical-align: top">
																		<th
																			style="
																				margin: 0;
																				color: #3c4043;
																				font-family: Roboto, Helvetica, Arial,
																					sans-serif;
																				font-size: 14px;
																				font-weight: 400;
																				line-height: inherit;
																				margin: 0;
																				padding: 0 0 24px;
																				text-align: left;
																			"
																		>
																			<h2
																				style="
																					margin: 0;
																					margin-bottom: 8px;
																					color: #3c4043;
																					font-family: Google Sans, Helvetica,
																						Arial, sans-serif;
																					font-size: 24px;
																					font-weight: 700;
																					line-height: 40px;
																					margin: 0;
																					margin-bottom: 24px;
																					margin-top: 20px;
																					padding: 0;
																					word-wrap: normal;
																					text-align: center;
																				"
																			>
																				Se creo un nuevo usuario para ti en WIS
																			</h2>

																			<p
																				style="
																					margin: 0;
																					margin-bottom: 16px;
																					color: #3c4043;
																					font-family: Roboto, Helvetica, Arial,
																						sans-serif;
																					font-size: 14px;
																					font-weight: 400;
																					line-height: 24px;
																					margin: 0;
																					margin-bottom: 16px;
																					padding: 0;
																				"
																			>
																				Hola :
																			</p>

																			<p
																				style="
																					margin: 0;
																					margin-bottom: 16px;
																					color: #3c4043;
																					font-family: Roboto, Helvetica, Arial,
																						sans-serif;
																					font-size: 14px;
																					font-weight: 400;
																					line-height: 24px;
																					margin: 0;
																					margin-bottom: 16px;
																					padding: 0;
																					text-align: justify;
																				"
																			>
																				Se ha creado un nuevo usuario en el
																				Sistema de Información Web “WIS”, con
																				este usuario usted tendrá acceso a los
																				módulos de gestión que se encuentran
																				disponibles en WIS..
																			</p>

																			<p
																				style="
																					margin: 0;
																					margin-bottom: 16px;
																					color: #3c4043;
																					font-family: Roboto, Helvetica, Arial,
																						sans-serif;
																					font-size: 14px;
																					font-weight: 400;
																					line-height: 24px;
																					margin: 0;
																					margin-bottom: 16px;
																					padding: 0;
																					text-align: justify;
																				"
																			>
																				Se le recuerda que el acceso a WIS es
																				para fines estrictamente laborales y que
																				la información que allí se maneja es
																				confidencial y de uso exclusivo de
																				ASCUN.
																			</p>

																			<p
																				style="
																					margin: 0;
																					margin-bottom: 16px;
																					color: #3c4043;
																					font-family: Roboto, Helvetica, Arial,
																						sans-serif;
																					font-size: 14px;
																					font-weight: 400;
																					line-height: 24px;
																					margin: 0;
																					margin-bottom: 16px;
																					padding: 0;
																					text-align: justify;
																				"
																			>
																				A continuación, se detallan los datos de
																				autenticación del sistema:<br />
																				<strong>Usuario:</strong> 72295936<br />
																				<strong>Validación de usuario:</strong>
																				Para validar su usuario debe ingresar la
																				fecha de expedición de su documento de
																				identidad.<br />
																				<strong>Contraseña:</strong> WcIDSY
																			</p>

																			<p
																				style="
																					margin: 0;
																					margin-bottom: 16px;
																					color: #3c4043;
																					font-family: Roboto, Helvetica, Arial,
																						sans-serif;
																					font-size: 14px;
																					font-weight: 400;
																					line-height: 24px;
																					margin: 0;
																					margin-bottom: 16px;
																					padding: 0;
																				"
																			>
																				Haga clic en
																				<strong>Acceder</strong> para acceder al
																				sistema con el usuario y la contraseña
																				suministrados anteriormente.
																				<link
																					rel="stylesheet"
																					href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
																				/>
																				<a
																					href="#"
																					style="
																						box-shadow: none;
																						color: darkgray;
																					"
																				>
																					<i class="fas fa-fingerprint"></i
																				></a>
																			</p>

																			<div>
																				<table
																					role="presentation"
																					style="
																						margin: 9px 0 24px 0;
																						border-collapse: collapse;
																						border-spacing: 0;
																						margin: 9px 0 24px 0;
																						padding: 0;
																						vertical-align: top;
																						width: auto;
																						margin-left: auto;
																						margin-right: auto;
																					"
																				>
																					<tbody>
																						<tr
																							style="
																								padding: 0;
																								vertical-align: top;
																							"
																						>
																							<td
																								style="
																									margin: 0;
																									border-collapse: collapse !important;
																									color: #3c4043;
																									font-family: Roboto, Helvetica,
																										Arial, sans-serif;
																									font-size: 14px;
																									font-weight: 400;
																									line-height: inherit;
																									margin: 0;
																									padding: 0;
																									vertical-align: top;
																									word-wrap: keep-all;
																								"
																							>
																								<table
																									style="
																										border-collapse: collapse;
																										border-spacing: 0;
																										padding: 0;
																										vertical-align: top;
																										width: 100%;
																									"
																								>
																									<tbody>
																										<tr
																											style="
																												padding: 0;
																												vertical-align: top;
																											"
																										>
																											<td
																												style="
																													margin: 0;
																													background: #1a73e8;
																													border: none;
																													border-collapse: collapse !important;
																													border-radius: 3px;
																													color: #fff;
																													font-family: Roboto,
																														Helvetica, Arial,
																														sans-serif;
																													font-size: 14px;
																													font-weight: 400;
																													line-height: inherit;
																													margin: 0;
																													padding: 0;
																													vertical-align: top;
																													word-wrap: keep-all;
																												"
																											>
																												<a
																													href="https://accounts.google.com/RP?c=CIb6gIP1v7mJ0QEQyo7ypOTkiLR-&amp;uc=ac&amp;hl=es_419&amp;continue=https://workspace.google.com/dashboard&amp;fc=1"
																													style="
																														margin: 0;
																														border: 0 solid
																															#1a73e8;
																														border-radius: 3px;
																														color: #fff;
																														display: inline-block;
																														font-family: Roboto,
																															Helvetica, Arial,
																															sans-serif;
																														font-size: 14px;
																														font-weight: 500;
																														line-height: 24px;
																														margin: 0;
																														padding: 8px 16px
																															8px 16px;
																														text-decoration: none;
																													"
																													target="_blank"
																													data-saferedirecturl="https://www.google.com/url?q=https://accounts.google.com/RP?c%3DCIb6gIP1v7mJ0QEQyo7ypOTkiLR-%26uc%3Dac%26hl%3Des_419%26continue%3Dhttps://workspace.google.com/dashboard%26fc%3D1&amp;source=gmail&amp;ust=1630600967493000&amp;usg=AFQjCNEn8foxtewSyzOcs4mQu8H5rm0lAA"
																													>Acceder</a
																												>
																											</td>
																										</tr>
																									</tbody>
																								</table>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</div>
																			<p
																				style="
																					margin-top: 8px;
																					color: #3c4043;
																					font-family: Google Sans, Helvetica,
																						Arial, sans-serif;
																					font-size: 14px;
																					font-weight: 700;
																					line-height: 24px;
																					margin: 0;
																					margin-bottom: 0px;
																					padding: 0;
																				"
																			>
																				Saludos,
																			</p>

																			<p
																				style="
																					margin: 0;
																					color: #3c4043;
																					font-family: Google Sans, Helvetica,
																						Arial, sans-serif;
																					font-size: 14px;
																					font-weight: 700;
																					line-height: 24px;
																					margin: 0;
																					margin-bottom: 24px;
																					padding: 0;
																				"
																			>
																				El equipo de desarrollo WIS (Web
																				Information System)
																			</p>
																		</th>
																	</tr>
																</tbody>
															</table>
														</th>
													</tr>
												</tbody>
											</table>

											<table
												role="presentation"
												style="
													background: #f8f9fa;
													border-collapse: collapse;
													border-spacing: 0;
													display: table;
													margin-top: 0;
													padding: 0;
													vertical-align: top;
													width: 100%;
												"
											>
												<tbody>
													<tr style="padding: 0; vertical-align: top">
														<th
															style="
																margin: 0 auto;
																color: #3c4043;
																font-family: Roboto, Helvetica, Arial,
																	sans-serif;
																font-size: 14px;
																font-weight: 400;
																line-height: inherit;
																margin: 0 auto;
																padding: 0;
																padding-bottom: 0;
																padding-left: 40px;
																padding-right: 40px;
																width: 560px;
															"
														>
															<table
																style="
																	border-collapse: collapse;
																	border-spacing: 0;
																	padding: 0;
																	vertical-align: top;
																	width: 100%;
																"
															>
																<tbody>
																	<tr style="padding: 0; vertical-align: top">
																		<th
																			style="
																				margin: 0;
																				color: #3c4043;
																				font-family: Roboto, Helvetica, Arial,
																					sans-serif;
																				font-size: 14px;
																				font-weight: 400;
																				line-height: inherit;
																				margin: 0;
																				padding: 24px;
																				text-align: left;
																			"
																		>
																			<p
																				style="
																					margin: 0;
																					margin-bottom: 16px;
																					color: #6c737f;
																					font-family: Roboto, Helvetica, Arial,
																						sans-serif;
																					font-size: 12px;
																					font-weight: 400;
																					line-height: 16px;
																					margin: 0;
																					margin-bottom: 14px;
																					padding: 0;
																				"
																			>
																				&copy;
																				<script>
																					document.write(
																						new Date().getFullYear()
																					)
																				</script>
																				WIS, Colombia
																			</p>
																			<p
																				style="
																					margin: 0;
																					margin-bottom: 16px;
																					color: #6c737f;
																					font-family: Roboto, Helvetica, Arial,
																						sans-serif;
																					font-size: 12px;
																					font-weight: 400;
																					line-height: 16px;
																					margin: 0;
																					margin-bottom: 14px;
																					padding: 0;
																				"
																			>
																				<em>
																					Este mensaje es un anuncio de servicio
																					obligatorio por correo electrónico que
																					tiene como fin ponerlo al tanto de los
																					cambios importantes implementados en
																					su cuenta de WIS.
																				</em>
																			</p>
																		</th>
																		<th
																			style="
																				margin: 0;
																				color: #3c4043;
																				font-family: Roboto, Helvetica, Arial,
																					sans-serif;
																				font-size: 14px;
																				font-weight: 400;
																				line-height: inherit;
																				margin: 0;
																				padding: 0 !important;
																				width: 0;
																			"
																		></th>
																	</tr>
																</tbody>
															</table>
														</th>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
    '
);
/**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 */
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    echo "<pre>";
      print $response->statusCode() . "\n";
      print_r($response->headers());
      print $response->body() . "\n";
    echo "</pre>";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}