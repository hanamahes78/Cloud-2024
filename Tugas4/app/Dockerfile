# Gunakan image Python 3.9
FROM python:3.9-slim

# Set working directory
WORKDIR /app

# Salin file requirements.txt
COPY requirements.txt .

# Install dependencies
RUN pip install --no-cache-dir -r requirements.txt

# Salin aplikasi Flask
COPY . .

# Expose port untuk aplikasi Flask
EXPOSE 5000

# Jalankan aplikasi Flask
CMD ["python", "app.py"]
