import os
import re

def insert_code_after_body_tag(html_content, code_to_insert):
    body_tag_pattern = re.compile(r'<body[^>]*>', re.IGNORECASE)
    match = body_tag_pattern.search(html_content)
    if not match:
        raise Exception("No <body> tag found in the HTML file.")
    body_tag_end = match.end()
    updated_html_content = html_content[:body_tag_end] + code_to_insert + html_content[body_tag_end:]
    return updated_html_content


def process_html_files_in_directory(directory_path, code_to_insert):
    for filename in os.listdir(directory_path):
        print(filename)
        if filename.endswith(".php"):

            file_path = os.path.join(directory_path, filename)
            with open(file_path, 'r', encoding='utf-8') as file:
                html_content = file.read()
            updated_html_content = insert_code_after_body_tag(html_content, code_to_insert)
            with open(file_path, 'w', encoding='utf-8') as file:
                file.write(updated_html_content)
    print("Code inserted in all HTML files in the directory.")


# Usage
path = os.getcwd()
code = '''
<!-- loader Start -->
<div id="loading">
    <div class="loader simple-loader">
      <div class="loader-body"></div>
    </div>
</div>
<!-- loader END -->'''
process_html_files_in_directory(path, code)


