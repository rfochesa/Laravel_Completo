<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;
use Redirect;

Use mPDF;

class ContatosController extends Controller {

    public function contatos($id) {
    	$contatos = Contato::where('cliente_id', $id)->get();

        //return view('contatos.lista', ['contatos' => $contatos]);	
        $html = view('contatos.lista', ['contatos' => $contatos]);

        //Create an instance of the class:
		//$mpdf = new mPDF();

		// Write some HTML code:
		//$mpdf->WriteHTML($html);

		// Output a PDF file directly to the browser
		//$mpdf->Output();	       


$mpdf = new mPDF();

$mpdf->WriteHTML($html);

$content = $mpdf->Output('', 'S');

$content = chunk_split(base64_encode($content));

$mailto = 'ricardo@rgsoft.com.br';

$from_name = 'Motozapp';

$from_mail = 'motozapp@rgsoft.com.br';

$uid = md5(uniqid(time()));

$subject = 'Assunto';

$message = 'Mensagem';

$filename = 'filename.pdf';

$header = "From: ".$from_name." <".$from_mail.">\r\n";

$header .= "MIME-Version: 1.0\r\n";

$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

$header .= "This is a multi-part message in MIME format.\r\n";

$header .= "--".$uid."\r\n";

$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";

$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

$header .= $message."\r\n\r\n";

$header .= "--".$uid."\r\n";

$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";

$header .= "Content-Transfer-Encoding: base64\r\n";

$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";

$header .= $content."\r\n\r\n";

$header .= "--".$uid."--";

$is_sent = @mail($mailto, $subject, "", $header);

$mpdf->Output();

exit;		



    }	


}
