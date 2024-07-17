<?php
require('fpdf/fpdf.php');
require_once('db_connect.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('assets/img/logo.png', 10, 6, 20);
        $this->SetFont('Arial', 'B', 12);
        // Title
        $this->Cell(0, 10, 'Meetings', 0, 1, 'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Load data
    function LoadData($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `meetings` WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Table
    function CreateTable($data)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Meeting Information', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);

        $this->Cell(50, 10, 'Type:', 0, 0);
        $this->Cell(0, 10, $data['type'], 0, 1);
        $this->Cell(50, 10, 'Date:', 0, 0);
        $this->Cell(0, 10, $data['date'], 0, 1);
        $this->Cell(50, 10, 'Time:', 0, 0);
        $this->Cell(0, 10, $data['time'], 0, 1);
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Agenda', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $data['agenda']);
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Members Absent', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $data['absent']);
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Members Present', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $data['attendees']);
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Content', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $data['content']);
    }
}

// Get the meeting ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : die("Meeting ID not provided.");

$pdf = new PDF();
$pdf->AddPage();
$data = $pdf->LoadData($id);
$pdf->CreateTable($data);
$pdf->Output('D', 'minutes_' . $id . '.pdf'); // 'I' for inline view, 'D' for download

$conn->close();
?>
