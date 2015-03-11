var c = 0; // LA Rep Validation
var checked = new Array(3); // LA Rep Validation

/* Start Form Validation */
function submitValidation()
{
	var i, j;
	var governmentPosition = ["usgpresident", "usgvicepresidentint", "usgvicepresidentext", "usgtreasurer", "usgsecretary",
		"stcpresident", "stccolrep"];
	var positionEquivalent = ["USG President", "USG Vice President for Internal Affairs", "USG Vice President for External Affairs",
		"USG Treasurer", "USG Secretary", "Campus President", "College Representative"];
	var votes = [false, false, false, false, false, false, false];
	var govlen = governmentPosition.length;
	
	for( j = 0; j < govlen; j++ )
	{
		var candidacy = document.getElementsByName( governmentPosition[j] );
		//console.log( governmentPosition[j] );
		var candlen = candidacy.length;
		for( i = 0; i < candlen; i++ )
		{
			if ( candidacy[i].checked )
			{
				votes[j] = true;
				break;
			}
		}
	}
	
	var votelen = votes.length;
	var notVoted = [];
	for( i = 0; i < votelen; i++ )
	{
		if ( !votes[i] )
		{
			notVoted.push(i);
		}
	}
	
	var notlen = notVoted.length;
	var listOfNoVotes = [];
	for( i = 0; i < notlen; i++ )
	{
		listOfNoVotes.push( positionEquivalent[ notVoted[i] ] );
	}
	
	if ( c == 0 )
	{
		listOfNoVotes.push( "2 Legislative Assembly Representatives" );
	}
	else if ( c == 1 )
	{
		listOfNoVotes.push( "1 more Legislative Assembly Representative" );
	}
	
	console.log( notlen + " " + c);
	
	if ( notlen != 0 || c != 2 )
	{
		//alert( "You have not voted for the following: \n" + listOfNoVotes.join("\n") );
		document.getElementById("confirmBallotModal").innerHTML = "Incomplete Ballot!";
		document.getElementById("modalBody").innerHTML = "You have not voted for the following: <br /><br /><b>" + listOfNoVotes.join("<br />") + "</b><br /><br />You must vote either a candidate or Abstain for the position(s) mentioned above.";
		document.getElementById("modalButtonPlacement").innerHTML = "<button type=\"button\" class=\"cancelButton\" data-dismiss=\"modal\">Go Back!</button>";
	}
	else
	{
		document.getElementById("confirmBallotModal").innerHTML = "Confirm Your Votes!";
		document.getElementById("modalBody").innerHTML = "Are you sure with your votes? Once you submit your ballot, you cannot change it!";
		document.getElementById("modalButtonPlacement").innerHTML = "<button type=\"button\" class=\"cancelButton\" data-dismiss=\"modal\">Wait! Go Back!</button><button type=\"submit\" class=\"okayButton\">Submit My Ballot!</button>";
	}
}
/* End Form Validation */

/* Start LA Rep 2-Count */
function countlarep( larep ) // onclick="countlarep(this)"
{	
	if ( larep.checked )
	{
		checked[c] = larep.id;
		c++;
		//console.log( "c = " + c + '\nchecked[c-1] = ' + checked[c-1] );
		
		/* If the user checks 3 options, cancel the first one; move everything to occupy the first element of the checked[] array. */
		if ( c > 2 ) 
		{
			//console.log( 'c > 2' );
			//console.log( typeof(checked[0]) + "\ndocument.getElementById( checked[0] ).value = " + document.getElementById( checked[0] ).value );

			document.getElementById( checked[0] ).checked = false;
			checked[0] = checked[1];
			checked[1] = checked[2];
			c--;

			//console.log( document.getElementById( checked[0] ).value + ', ' + document.getElementById( checked[1] ).value );
		}
	}
	else
	{
		/* Look for checked[c] == larep.id; cancel it. */
		var len = checked.length;
		var i;
		
		/* If it was the first element in checked[] move the next element to occupy its space. */
		for( i = 0; i < len ; i++ )
		{
			if ( checked[i] == larep.id && i == 0)
			{
				checked[0] = checked[1];
			}
		}
		
		c--;
		//console.log( c );
	}
}
/* End LA Rep 2-Count */