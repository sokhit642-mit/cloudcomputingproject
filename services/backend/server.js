const express = require('express');
const cors = require('cors');
const os = require('os');

const app = express();
const PORT = process.env.PORT || 5000;

app.use(cors());
app.use(express.json());

app.get('/health', (req, res) => {
  res.status(200).json({ status: 'UP', timestamp: new Date() });
});

app.get('/api/info', (req, res) => {
  res.status(200).json({
    message: 'Hello from Cloud Capstone Backend API!',
    container_id: os.hostname(),
    uptime: `${Math.floor(process.uptime())}s`
  });
});

app.listen(PORT, () => {
  console.log(`Backend service listening on port ${PORT}`);
});