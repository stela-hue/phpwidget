<?php

// Set page title and other variables
$pageTitle = "CPU Library - Collection Search Widget";
$libraryName = "CPU Henry Luce III Library";
$description = "Search the Central Philippine University Library collection powered by Follett Destiny";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($pageTitle); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8) 0%, rgba(118, 75, 162, 0.8) 100%),
                        url('school.jpg') no-repeat center center/cover;
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 300;
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .logo {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
            vertical-align: middle;
        }

        /* Main Content */
        .main-content {
            padding: 40px;
        }

        /* Search Widget Styles */
        .search-widget {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 40px;
            border-left: 5px solid #667eea;
        }

        .widget-title {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-form {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            min-width: 250px;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .search-input:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-type-select {
            padding: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            background: white;
            cursor: pointer;
            min-width: 150px;
        }

        .search-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .search-options {
            display: flex;
            gap: 20px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .option-group {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .option-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #667eea;
        }

        .option-group label {
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        .php-info {
            background: #e8f4f8;
            border: 1px solid #bee5eb;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            color: #0c5460;
        }

        .php-info h3 {
            margin-bottom: 10px;
            color: #0c5460;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>
                <img src="school logo.png" style="width: 50px; height: 50px; margin-bottom: 10px; vertical-align: middle;">
                <?php echo ($libraryName); ?>
            </h1>
            <p><?php echo ($description); ?></p>
        </div>
        
        <div class="main-content">
            <!-- Main Search Widget -->
            <div class="search-widget">
                <div class="widget-title">
                    <span>🔍</span>
                    <span>Library Collection Search Widget</span>
                </div>
                
                <form class="search-form" onsubmit="handleSearch(event)" method="GET">
                    <input type="text" 
                           class="search-input" 
                           placeholder="Enter book title, author, ISBN, or keywords..." 
                           id="mainSearch" 
                           name="search_term"
                           value="<?php echo isset($_GET['search_term']) ? ($_GET['search_term']) : ''; ?>"
                           required>
                    
                    <select class="search-type-select" id="searchType" name="search_type">
                        <option value="all" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'all') ? 'selected' : ''; ?>>All Fields</option>
                        <option value="title" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'title') ? 'selected' : ''; ?>>Title</option>
                        <option value="author" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'author') ? 'selected' : ''; ?>>Author</option>
                        <option value="subject" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'subject') ? 'selected' : ''; ?>>Subject</option>
                        <option value="isbn" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'isbn') ? 'selected' : ''; ?>>ISBN</option>
                        <option value="keyword" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'keyword') ? 'selected' : ''; ?>>Keyword</option>
                    </select>
                    
                    <button type="submit" class="search-btn">
                        <span>🔍</span>
                        <span>Search</span>
                    </button>
                </form>
                
                <div class="search-options">
                    <div class="option-group">
                        <input type="checkbox" 
                               id="availableOnly" 
                               name="available_only"
                               <?php echo (isset($_GET['available_only']) || !isset($_GET['search_term'])) ? 'checked' : ''; ?>>
                        <label for="availableOnly">Available items only</label>
                    </div>
                    <div class="option-group">
                        <input type="checkbox" 
                               id="includeEbooks" 
                               name="include_ebooks"
                               <?php echo isset($_GET['include_ebooks']) ? 'checked' : ''; ?>>
                        <label for="includeEbooks">Include e-books</label>
                    </div>
                    <div class="option-group">
                        <input type="checkbox" 
                               id="peerReviewed" 
                               name="peer_reviewed"
                               <?php echo isset($_GET['peer_reviewed']) ? 'checked' : ''; ?>>
                        <label for="peerReviewed">Peer-reviewed sources</label>
                    </div>
                </div>
            </div>

            <?php
            // PHP Processing Section - Display search results or information
            if (isset($_GET['search_term']) && !empty($_GET['search_term'])) {
                $searchTerm = htmlspecialchars($_GET['search_term']);
                $searchType = isset($_GET['search_type']) ? htmlspecialchars($_GET['search_type']) : 'all';
                $availableOnly = isset($_GET['available_only']);
                $includeEbooks = isset($_GET['include_ebooks']);
                $peerReviewed = isset($_GET['peer_reviewed']);
                
                echo '<div class="php-info">';
                echo '<h3>Search Parameters (PHP Processing)</h3>';
                echo '<p><strong>Search Term:</strong> ' . $searchTerm . '</p>';
                echo '<p><strong>Search Type:</strong> ' . ucfirst($searchType) . '</p>';
                echo '<p><strong>Available Only:</strong> ' . ($availableOnly ? 'Yes' : 'No') . '</p>';
                echo '<p><strong>Include E-books:</strong> ' . ($includeEbooks ? 'Yes' : 'No') . '</p>';
                echo '<p><strong>Peer-reviewed:</strong> ' . ($peerReviewed ? 'Yes' : 'No') . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script>
        function handleSearch(event) {
            event.preventDefault();
            
            const searchTerm = document.getElementById('mainSearch').value.trim();
            const searchType = document.getElementById('searchType').value;
            const availableOnly = document.getElementById('availableOnly').checked;
            const includeEbooks = document.getElementById('includeEbooks').checked;
            const peerReviewed = document.getElementById('peerReviewed').checked;
            
            if (!searchTerm) {
                alert('Please enter a search term');
                return;
            }

            // Search Result Page URL for CPU Library Destiny
            let searchUrl = 'https://search.follettsoftware.com/metasearch/ui/78886/search/all?';
            
            // Add search parameters based on the form inputs
            const params = new URLSearchParams();

            // Map search types to Destiny parameters
            switch(searchType) {
                case 'title':
                    params.append('l2m', 'title');
                    break;
                case 'author':
                    params.append('l2m', 'author');
                    break;
                case 'subject':
                    params.append('l2m', 'subject');
                    break;
                case 'isbn':
                    params.append('l2m', 'isbn');
                    break;
                case 'keyword':
                    params.append('l2m', 'keyword');
                    break;
                default:
                    params.append('l2m', 'all');
            }

            params.append('q', searchTerm);
            
            // Add additional filters if selected
            if (availableOnly) {
                params.append('available', 'true');
            }
            
            if (includeEbooks) {
                params.append('format', 'ebook');
            }
            
            if (peerReviewed) {
                params.append('peer_reviewed', 'true');
            }

            // Construct final URL
            const finalUrl = `${searchUrl}&${params.toString()}`;
            
            // Open the search in a new tab/window
            window.open(finalUrl, '_blank');
        }
        
        // Add enter key support for search input
        document.getElementById('mainSearch').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                handleSearch(event);
            }
        });
    </script>
</body>
</html>