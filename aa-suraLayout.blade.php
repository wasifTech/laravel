<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Al Quran : Arabic with Urdu & English Translations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="ur">
    <meta name="description" content="Quran, Islam, message, message of God, creator, best science book, love, peace, ancient religions">
    <meta name="Keywords" content="Quran, Islam, message, message of God, creator, best science book, love, peace, ancient religions, translation in Urdu, Translation in English, Arabic, fonts, Nastaleeq, Noorikhuda, mehmood ul hassan, fateh, mohsin">
   
    <link rel="stylesheet" type="text/css" href="{{ asset('css/alquran.css') }}">
</head>
<body class="body common-style">
<div class="container">

    <!-- Your container content -->



 
 <div id="rightHalf" >
 
@php

$suraNo =1; 
if ($suraNo == "") {
    $suraNo = 112;
    $suraName = " سورۃ اخلاص";
}

if ($suraNo == 0) {
    $suraNo = 110;
    $suraName = "سورۃ النصر";
}

$finds = "SELECT * FROM quran WHERE suraNo = '$suraNo' ";
// echo " <br> \n Processing Sura No $suraNo <br> \n ";
// Debugging: Print the query statement
// echo "<p>Query Statement: $finds</p>";

$result = DB::select($finds);
$counts = $abc = 0; 
if (count($result) > 0) {
    foreach ($result as $row) {
        $counts++;
        $thisRow = $row->id;
        $suraNo = $row->suraNo;
        $suraName = $row->suraName;
        $ayatNo = $row->ayatNo;
        $rakuNo = $row->rakuNo;
        $paraNo = $row->paraNo;
        $paraName = $row->paraName;
        $qufateh = $row->qufateh;
        $qumehmood = $row->qumehmood;
        $engMohsin = $row->engMohsin;
        $engTaqi = $row->engTaqi;
        $nextSuraNo = $suraNo + 1;

        echo " \n  \n <div id='suraBlock'>  ";
        echo " \n <div class = \"arabic\" style= \" width: 92%;\"   > ";
        echo "<span class = \"ayatNumberListStyle\"   > ";
        echo $abc;
        echo "    </span>  &nbsp;&nbsp;    ";
      
        echo $row->quranArabic;
        echo " \n</div > ";
        echo " \n <div class = \"qumehmood\"  style= \"padding-right: 80px; width: 85%;\"  >  ";
        echo $row->qumehmood;
        echo " \n  </div > ";
        echo " \n  </div > ";
        $abc++;
    }
}

echo " \n  </div > ";
// echo " <form method=\"GET\" action=\"{{ url(\'shapes\') }}\">  </form> "; 		
		
if ($nextSuraNo < 115) {  
    $newData = "SELECT suraName FROM quran WHERE suraNo =  '$nextSuraNo' ";		
    $nextName = DB::select($newData);	
    if (count($nextName) > 0) {
        foreach ($nextName as $row6) {
            $nextSuraName = $row6->suraName;
            break; 
        } 
    }
} else {  
    echo "  Total 114 Sura in Holy Quran. ) ";  
    $nextSuraNo = 1 ;  
    $nextSuraName = "الفاتحۃ";
}


@endphp

 <div id="leftHalf" >
 	<div class="btn btn2">
<form method="POST" action="{{ route('submit-new-data') }}">
    @csrf {{-- Cross-Site Request Forgery protection --}}
    <label for="rectLength">Rectangle Length (X)</label>
    <input type="text" id="rectLength" name="rectLength" value="100"><br>
    <label for="rectWidth">Rectangle Width (Y)</label>
    <input type="text" id="rectWidth" name="rectWidth" value="50"><br>
    <!-- Square -->
    <label for="sqLength">Square Length (X)</label>
    <input type="text" id="sqLength" name="sqLength" value="20"><br>
    <label for="sqWidth">Square Width (Y)</label>
    <input type="text" id="sqWidth" name="sqWidth" value="40"><br>
    <!-- Additional shapes parameters -->
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" value="Long" ></textarea><br>
    <button type="submit" class="button2">Submit</button>
</form>




</div>


 	<div class="btn btn3">
 	<form method="GET" action="{{ url('shapes') }}">
    	
        @csrf {{-- Cross-Site Request Forgery protection --}}
        <button type="submit" class="button2">Go to Shapes</button>
    </form>
</div>



<!-- Search Bar -->
<div class="searchBar">
    <form method="post" action="{{ url('ayat') }}">
        <div class="headingText">تحقیق و تلاش</div>
        <p>قرآن مجید کے اردو اور انگریزی ترجمہ میں سے تلاش کے لیے</p>
        <input type="text" name="findWord" placeholder="مطلوبہ لفظ یا جملہ یہاں لکھیں" />
    </form>
</div>
<!-- Next Surah Form -->
    <div class="introBlock">
        <div class="suraTitle"> {{ $suraName }} </div>
        <div class="suraTranslator"> ترجمہ: محمود الحسن </div>
        <div class="suraData">  سورۃ نمبر : {{ $suraNo }} <br> کل آیات : {{ $counts }} </div>
        
	</div> 


		
<!-- Next Surah Form -->
<div class="nextSuraData">
       <!-- Form for submitting data for Next Sura Display-->
       <form method="POST" action="{{ route('submit-form') }}">
        @csrf <!-- Add this line for CSRF protection -->
        <input type="hidden" name="suraNo" value="{{ $nextSuraNo }}" />
        <button type="submit" class="button22"> 
            {{ $nextSuraNo }} <br>  Next Sura 
            {{ $nextSuraName }}
        </button>
    </form>
</div>


</div></div>





</body>
</html>

