<!DOCTYPE html>
<html>
    <head>
        <title>Graph Output</title>
        
        <link rel="stylesheet" type="text/css" href="./assignment4.css" />
        <script src="./assignment4.js"> </script>
        	
    </head>
<body>
	<h1>Graph Output</h1>
    <br />
    <form name="inputs" action="assignment4.php" onsubmit="return validateInput();" method="POST">
	    <div>
		    <label>Label One:</label>
		    <input type="text" id="labelOne" name="labelOne" />
		</div>
		<div>
		    <label>Value</label>
		    <input type="text" id="valueOne" name="valueOne"/>
		</div>
		<br />
		<div>
			<label>Label Two:</label>
			<input type="text" id="labelTwo" name="labelTwo"/>
		</div>
		<div>
			<label>Value</label>
			<input type="text" id="valueTwo" name="valueTwo"/>
		</div>
		<br />
		<div>
			<label>Label Three:</label>
			<input type="text" id="labelThree" name="labelThree"/>
		</div>
		<div>
			<label>Value</label>
			<input type="text" id="valueThree" name="valueThree"/>
		</div>
		<br />
		<div>
			<label>Label Four:</label>
			<input type="text" id="labelFour" name="labelFour"/>
		</div>
		<div>
			<label>Value</label>
			<input type="text" id="valueFour" name="valueFour"/>
		</div>
		<br /> <br />
		<input type="submit" value="Submit">
		<br /> <br />
		<div id="errorInputs"></div>
	</form>

    <?php if (!empty($_POST)) {
        $labelOne = $_POST["labelOne"];
        $labelTwo = $_POST["labelTwo"];
        $labelThree = $_POST["labelThree"];
        $labelFour = $_POST["labelFour"];

        $valueOne = $_POST["valueOne"];
        $valueTwo = $_POST["valueTwo"];
        $valueThree = $_POST["valueThree"];
        $valueFour = $_POST["valueFour"];

        $maxBar = max($valueOne, $valueTwo, $valueThree, $valueFour);
        $unit = (450) / ($maxBar);
        $maxTick = intval($maxBar);

        $valueOne = $_POST["valueOne"] * $unit;
        $valueTwo = $_POST["valueTwo"] * $unit;
        $valueThree = $_POST["valueThree"] * $unit;
        $valueFour = $_POST["valueFour"] * $unit;

        $barWidth = 100;
        $barMargin = 10;

        $barOneXPos = 10;
        $barTwoXPos = $barOneXPos + $barWidth + $barMargin;
        $barThreeXPos = $barTwoXPos + $barWidth + $barMargin;
        $barFourXPos = $barThreeXPos + $barWidth + $barMargin;

        $barOneYPos = $valueOne * -1;
        $barTwoYPos = $valueTwo * -1;
        $barThreeYPos = $valueThree * -1;
        $barFourYPos = $valueFour * -1;

        $labelOnePos = $barOneXPos + ($barWidth / 2);
        $labelTwoPos = $barTwoXPos + ($barWidth / 2);
        $labelThreePos = $barThreeXPos + ($barWidth / 2);
        $labelFourPos = $barFourXPos + ($barWidth / 2);

        echo ("
        <svg width='960' height='500'>
            <g transform='translate(40,20)'>
                <g class='x axis' transform='translate(0,450)'>
                    <g class='tick' transform='translate($labelOnePos,0)'>
                        <line y2='6' x2='0'></line>
                        <text dy='.71em' y='9' x='0' style='text-anchor: middle;'>$labelOne</text>
                    </g>

                    <g class='tick' transform='translate($labelTwoPos,0)'>
                        <line y2='6' x2='0'></line>
                        <text dy='.71em' y='9' x='0' style='text-anchor: middle;'>$labelTwo</text>
                    </g>

                    <g class='tick' transform='translate($labelThreePos,0)'>
                        <line y2='6' x2='0'></line>
                        <text dy='.71em' y='9' x='0' style='text-anchor: middle;'>$labelThree</text>
                    </g>

                    <g class='tick' transform='translate($labelFourPos,0)'>
                        <line y2='6' x2='0'></line>
                        <text dy='.71em' y='9' x='0' style='text-anchor: middle;'>$labelFour</text>
                    </g>
                        
                    <path d='M0,6V0H900V6'></path>
                </g>

                <g class='y axis'>
                    <g class='tick' transform='translate(0,450)'>
                        <line x2='-6' y2='0'></line>
                        <text dy='.32em' x='-9' y='0' style='text-anchor: end;'>0</text>
                    </g>
                    
                    <g class='tick' transform='translate(0,338)'>
                        <line x2='-6' y2='0'></line>
                        <text dy='.32em' x='-9' y='0' style='text-anchor: end;'></text>
                    </g>
                    
                    <g class='tick' transform='translate(0,226)'>
                        <line x2='-6' y2='0'></line>
                        <text dy='.32em' x='-9' y='0' style='text-anchor: end;'></text>
                    </g>
                    
                    <g class='tick' transform='translate(0,114)' style='opacity: 1;'>
                        <line x2='-6' y2='0'></line>
                        <text dy='.32em' x='-9' y='0' style='text-anchor: end;'></text>
                    </g>
                    
                    <g class='tick' transform='translate(0,0)'>
                        <line x2='-6' y2='0'></line>
                        <text dy='.32em' x='-9' y='0' style='text-anchor: end;'>$maxTick</text>
                    </g>
                    
                    <path d='M-6,0H0V450H-6'></path>
                </g>

                <g transform='translate(0,450)'>
                    <rect class='bar' x=$barOneXPos width=$barWidth y=$barOneYPos height=$valueOne></rect>
                    <rect class='bar' x=$barTwoXPos width=$barWidth y=$barTwoYPos height=$valueTwo></rect>
                    <rect class='bar' x=$barThreeXPos width=$barWidth y=$barThreeYPos height=$valueThree></rect>
                    <rect class='bar' x=$barFourXPos width=$barWidth y=$barFourYPos height=$valueFour></rect>
                </g>
            </g>
        </svg>
        ");

    }
    ?>

</body>
</html>