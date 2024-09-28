<?php

namespace App\Services;

use Mpdf\Mpdf;

class PdfService
{
    public function createPdf($data)
    {
        $mpdf = new Mpdf();

        $html = $this->generateHtml($data);
        $filePath = __DIR__ . '/../../storage/pdfs/' . uniqid('request_', true) . '.pdf';
        $mpdf->WriteHTML($html);

        $mpdf->Output($filePath, \Mpdf\Output\Destination::FILE);

        return $filePath;
    }

    private function generateHtml($data)
    {
        $userName = $data['userName'];
        $requestTitle = $data['requestTitle'];
        $requestDescription = $data['requestDescription'];
        $date = date('Y-m-d H:i:s');

        ob_start();
        include __DIR__ . '/../Views/template.php';
        return ob_get_clean();
    }
}
