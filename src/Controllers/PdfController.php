<?php

namespace App\Controllers;

use App\Services\PdfService;

/**
 * @OA\Info(title="PDF Generation API", version="1.0")
 */
class PdfController
{
    private $pdfService;

    public function __construct()
    {
        $this->pdfService = new PdfService();
    }

    /**
     * @OA\Post(
     *     path="/generate-pdf",
     *     summary="Generate PDF",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"userName", "requestTitle", "requestDescription"},
     *             @OA\Property(property="userName", type="string"),
     *             @OA\Property(property="requestTitle", type="string"),
     *             @OA\Property(property="requestDescription", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="PDF generated successfully"
     *     )
     * )
     */
    public function generatePdf()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $fileName = $this->pdfService->createPdf($data);
        
        echo json_encode(['message' => 'PDF generated successfully', 'file' => $fileName]);
    }
}
