<script type="text/javascript" src="<?php echo _js_url() . 'valid.js';?>"></script>

<?php
	$attr = array(
		'id' => 'ballotform'
	);
	echo form_open('voter/SubmitVote', $attr)
?>

	<table id="mainframe">
		<!-- header + greetings -->
		<tr>
			<td>
				<div id="header">
					<span id="banner">General Elections 2015</span>
					<span id="greetuser">Welcome, <?php echo $studentName; ?>!</span>
				</div>
			</td>
		</tr>

		<!-- USG EB -->
		<tr>
			<td>
				<div class="separator"><span class="separator">USG EXECUTIVE BOARD</span></div>
			</td>
		</tr>

		<!-- USG PRES -->
		<tr>
			<td>
				<span class="candposition">President</span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<table>
						<tr>
						<?php
						
							for($c = 0; $c < count($usg_pres); $c++){
								$i = $c+1;
								echo "<td>";
								//echo "<input type=\"radio\" name=\"usgpresident\" value=\"" . $usg_pres[$c]->ID . "\" id=\"usgpres" . $i . "\">";
									echo "<input type=\"radio\" name=\"usgpresident\" value=\"" . $usg_pres[$c]->ID . "\" id=\"usgpres" . $i . "\">";
									echo "<label class=\"options\" for=\"usgpres" . $i . "\">";

										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";

												$fullname = $usg_pres[$c]->FName . " " . $usg_pres[$c]->LName . " ";
											
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}

											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
				<input type="radio" name="usgpresident" id="abstain" value="pabstain">
				<label class="options" for="abstain">
					<div class="selector_abstain">
						<span class="abstain">Abstain</span>
						<span class="xmark">&#10008 </span>
					</div>
				</label>
			</center>
			</td>
		</tr>
		<tr>
			<td>
				<br /><br />
			</td>
		</tr>

		<!-- USG VP INTERNAL -->
		<tr>
			<td>
				<span class="candposition">Vice-President for Internal Affairs</span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<table>
						<tr>
						<?php
							for($c = 0; $c < count($usg_vp_internal); $c++){
								$i = $c+1;
								echo "<td>";
									echo "<input type=\"radio\" name=\"usgvicepresidentint\" value=\"" . $usg_vp_internal[$c]->ID . "\" id=\"v" . $i . "\">";
									echo "<label class=\"options\" for=\"v" . $i . "\">";

										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";
												$fullname = $usg_vp_internal[$c]->FName . " " . $usg_vp_internal[$c]->LName . " ";
												
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}
											
											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>	
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
				<input type="radio" name="usgvicepresidentint" id="vabstain" value="viabstain">
				<label class="options" for="vabstain">
					<div class="selector_abstain">
						<span class="abstain">Abstain</span>
						<span class="xmark">&#10008 </span>
					</div>
				</label>
			</center>
			</td>
		</tr>
		<tr>
			<td>
				<br /><br />
			</td>
		</tr>

		<!-- USG VP EXTERNAL -->
		<tr>
			<td>
				<span class="candposition">Vice-President for External Affairs</span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
				<table>
					<tr>
						<?php
							for($c = 0; $c < count($usg_vp_external); $c++){
								$i = $c+1;
								echo "<td>";
									echo "<input type=\"radio\" name=\"usgvicepresidentext\" value=\"" . $usg_vp_external[$c]->ID . "\" id=\"ve". $i . "\">";
									echo "<label class=\"options\" for=\"ve". $i . "\">";

										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";
												$fullname = $usg_vp_external[$c]->FName . " " . $usg_vp_external[$c]->LName . " ";
												
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}
											
											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>	
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
				<input type="radio" name="usgvicepresidentext" id="veabstain" value="veabstain">
				<label class="options" for="veabstain">
					<div class="selector_abstain">
						<span class="abstain">Abstain</span>
						<span class="xmark">&#10008 </span>
					</div>
				</label>
			</center>
			</td>
		</tr>
		<tr>
			<td>
				<br /><br />
			</td>
		</tr>

		<!-- USG Treasurer -->
		<tr>
			<td>
				<span class="candposition">Treasurer</span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<table>
						<tr>
						<?php
							for($c = 0; $c < count($usg_treasurer); $c++){
								$i = $c+1;
								echo "<td>";
									echo "<input type=\"radio\" name=\"usgtreasurer\" value=\"" . $usg_treasurer[$c]->ID . "\" id=\"t". $i . "\">";
									echo "<label class=\"options\" for=\"t". $i . "\">";

										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";
												$fullname = $usg_treasurer[$c]->FName . " " . $usg_treasurer[$c]->LName . " ";
												
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}
											
											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>	
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
				<input type="radio" name="usgtreasurer" id="tabstain" value="tabstain">
				<label class="options" for="tabstain">
					<div class="selector_abstain">
						<span class="abstain">Abstain</span>
						<span class="xmark">&#10008 </span>
					</div>
				</label>
			</center>
			</td>
		</tr>
		<tr>
			<td>
				<br /><br />
			</td>
		</tr>

		<!-- USG Secretary -->
		<tr>
			<td>
				<span class="candposition">Secretary</span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<table>
						<tr>
						<?php
							for($c = 0; $c < count($usg_secretary); $c++){
								$i = $c+1;
								echo "<td>";
									echo "<input type=\"radio\" name=\"usgsecretary\" value=\"" . $usg_secretary[$c]->ID . "\" id=\"s". $i . "\">";
									echo "<label class=\"options\" for=\"s". $i . "\">";

										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";
												$fullname = $usg_secretary[$c]->FName . " " . $usg_secretary[$c]->LName . " ";
												
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}
											
											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>	
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
				<input type="radio" name="usgsecretary" id="sabstain" value="sabstain">
				<label class="options" for="sabstain">
					<div class="selector_abstain">
						<span class="abstain">Abstain</span>
						<span class="xmark">&#10008 </span>
					</div>
				</label>
			</center>
			</td>
		</tr>

		<!-- STC -->
		<tr>
			<td>
				<div class="separator"><span class="separator">SCIENCE & TECHNOLOGY COMPLEX GOVERNMENT</span></div>
			</td>
		</tr>
		<tr>
			<td>
				<br /><br />
			</td>
		</tr>

		<!-- STC CAMPUS PRES-->
		<tr>
			<td>
				<span class="candposition">Campus President</span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<table>
						<tr>
						<?php
							for($c = 0; $c < count($stc_campus_pres); $c++){
								$i = $c+1;
								echo "<td>";
									echo "<input type=\"radio\" name=\"stcpresident\" value=\"" . $stc_campus_pres[$c]->ID . "\" id=\"p". $i . "\">";
									echo "<label class=\"options\" for=\"p". $i . "\">";

										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";
												$fullname = $stc_campus_pres[$c]->FName . " " . $stc_campus_pres[$c]->LName . " ";
												
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}
											
											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>	
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
				<input type="radio" name="stcpresident" id="pabstain" value="cpabstain">
				<label class="options" for="pabstain">
					<div class="selector_abstain">
						<span class="abstain">Abstain</span>
						<span class="xmark">&#10008 </span>
					</div>
				</label>
			</center>
			</td>
		</tr>
		<tr>
			<td>
				<br /><br />
			</td>
		</tr>

		<!-- STC COLLEGE REP-->
		<tr>
			<td>
				<span class="candposition"><?php echo "College Representative"; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<table>
						<tr>
						<?php
							for($c = 0; $c < count($stc_college_rep); $c++){
								$i = $c+1;
								echo "<td>";
									echo "<input type=\"radio\" name=\"stccolrep\" value=\"" . $stc_college_rep[$c]->ID . "\" id=\"c". $i . "\">";
									echo "<label class=\"options\" for=\"c". $i . "\">";

										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";
												$fullname = $stc_college_rep[$c]->FName . " " . $stc_college_rep[$c]->LName . " ";
												
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}
											
											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>	
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
				<input type="radio" name="stccolrep" id="cabstain" value="crabstain">
				<label class="options" for="cabstain">
					<div class="selector_abstain">
						<span class="abstain">Abstain</span>
						<span class="xmark">&#10008 </span>
					</div>
				</label>
			</center>
			</td>
		</tr>
		<tr>
			<td>
				<br /><br />
			</td>
		</tr>

		<!-- STC LA REP-->
		<tr>
			<td>
				<span class="candposition"><?php echo "Legislative Assembly Representatives" ?></span>
			</td>
		</tr>
		<tr>
			<td>
				<center>
					<table>
						<tr>
						<?php
							for($c = 0; $c < count($stc_la_rep); $c++){
								$i = $c+1;
								echo "<td>";
									echo "<input type=\"checkbox\" name=\"stclarep[]\" id=\"l". $i . "\" value=\"". $stc_la_rep[$c]->ID ."\" onclick=\"countlarep(this)\">";
									echo "<label class=\"options\" for=\"l". $i . "\">";
									
										//Display names ni nikki and checkmark
										echo "<div class=\"selector\">";
											echo "<span class=\"candname\">";
												$fullname = $stc_la_rep[$c]->FName . " " . $stc_la_rep[$c]->LName . " ";
												
												// Entire name must be 25 characters
												// Fill with non-breakable space &nbsp;
												if ( strlen( $fullname ) < 14 )
												{
													$halfname = (25 - strlen($fullname) ) / 2;
												}
												else
												{
													$halfname = 1;
												}
												
												for( $x = 0; $x < $halfname; $x++ )
												{
													echo "&nbsp;";
												}
												
												echo $fullname;
												
												for( $x = 0; $x < $halfname+5; $x++ )
												{
													echo "&nbsp;";
												}
											
											echo "</span>";
											echo "<span class=\"checkmark\">&#10004 </span>"; //checkmark
										echo "</div>";
									echo "</label>";
								echo "</td>";
								//END Display names ni nikki and checkmark
							}
						?>	
						</tr>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
			<center>
			<table>
				<tr>
					<td>
						<input type="checkbox" name="stclarep[]" id="labstain" value="la1Abstain" onclick="countlarep(this)">
						<label class="options" for="labstain">
							<div class="selector_abstain">
								<span class="abstain">Abstain</span>
								<span class="xmark">&#10008 </span>
							</div>
						</label>
					</td>
					<td>
						<input type="checkbox" name="stclarep[]" id="l2abstain" value="la2Abstain" onclick="countlarep(this)">
						<label class="options" for="l2abstain">
							<div class="selector_abstain">
								<span class="abstain">Abstain</span>
								<span class="xmark">&#10008 </span>
							</div>
						</label>
					</td>
				</tr>
			</table>
			</center>
		</tr>
		<tr>
			<td>
				<button type="button" id="ballotbutton" onclick="submitValidation()" data-toggle="modal" data-target="#confirmBallot">Submit Ballot</button>
			</td>
		</tr>
	</table>
	<?php include_once('modals/incomplete_ballot_modal.php'); ?>	
<?php
	echo form_close();
?>