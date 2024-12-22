const express = require('express');
const QRCode = require('qrcode');
const fs = require('fs');
const path = require('path');

const app = express();
const PORT = 3000;

// Middleware to parse JSON
app.use(express.json());

// Route to generate and save a QR code
app.post('/generate-qr', async (req, res) => {
    const { url } = req.body; // Accept 'url' from request body

    if (!url) {
        return res.status(400).json({ error: 'URL is required' });
    }

    try {
        const fileName = `qr-${Date.now()}.png`; // Unique filename
        const filePath = path.join(__dirname, 'qr-images', fileName);

        // Generate QR Code and save as a PNG file
        await QRCode.toFile(filePath, url);

        res.status(200).json({
            message: 'QR code generated successfully',
            filePath: `/qr-images/${fileName}`, // Path to access the image
        });
    } catch (error) {
        console.error('Error generating QR code:', error);
        res.status(500).json({ error: 'Failed to generate QR code' });
    }
});

// Serve the QR images folder statically
app.use('/qr-images', express.static(path.join(__dirname, 'qr-images')));

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
