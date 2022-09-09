<?php

Switch($row["opravneni"]){
	case "0";
			$row["opravneni"] = "0 - Registrovaný";
		break;
	case "1";
			$row["opravneni"] = "1 - Student";
		break;
	case "2";
			$row["opravneni"] = "2 - Učitel, vedoucí prací";
		break;
	case "3";
			$row["opravneni"] = "3 - Administrátor";
		break;
}
Switch($row["blokovat"]){
	case "0";
			$row["blokovat"] = "NE";
			$stavchb = "";
		break;
	case "1";
			$row["blokovat"] = "ANO";
			$stavchb = "checked";
		break;
}
Switch($row["imap"]){
	case "0";
			$row["imap"] = "lokální uživatel";
		break;
	case "1";
			$row["imap"] = "SPS";
		break;
}

?>