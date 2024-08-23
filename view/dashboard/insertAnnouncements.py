import os
import re

def update_href_in_html(html_content, new_href):
    # Update the href in the <a> tag
    a_tag_pattern = re.compile(r'<a[^>]*class="btn btn-link btn-soft-light"[^>]*>', re.IGNORECASE)
    href_updated_content = re.sub(a_tag_pattern, lambda match: match.group(0).replace('href=""', f'href="{new_href}"'), html_content)
    
    return href_updated_content


def process_html_files_in_directory(directory_path, new_href):
    for filename in os.listdir(directory_path):

        print(filename)
        if filename.endswith(".php"):
            file_path = os.path.join(directory_path, filename)
            try:
                with open(file_path, 'r', encoding='utf-8') as file:
                    html_content = file.read()
                updated_html_content = update_href_in_html(html_content, new_href)
                with open(file_path, 'w', encoding='utf-8') as file:
                    file.write(updated_html_content)
                print(f"href updated in {filename}")
            except Exception as e:
                print(f"Error processing {filename}: {e}")


# Usage
path = os.getcwd()
new_href = 'announcements.php'

process_html_files_in_directory(path, new_href)

