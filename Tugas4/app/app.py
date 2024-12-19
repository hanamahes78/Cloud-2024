from flask import Flask, request, render_template
from colorthief import ColorThief
import os

app = Flask(__name__)

UPLOAD_FOLDER = 'uploads'
os.makedirs(UPLOAD_FOLDER, exist_ok=True)
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/upload', methods=['POST'])
def upload_file():
    if 'image' not in request.files:
        return 'No image file'

    file = request.files['image']
    if file.filename == '':
        return 'No selected file'

    if file:
        file_path = os.path.join(app.config['UPLOAD_FOLDER'], file.filename)
        file.save(file_path)

        color_thief = ColorThief(file_path)
        palette = color_thief.get_palette(color_count=6)

        return render_template('palette.html', palette=palette)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
