<h1>No Internet Connection</h1>

<script>
    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
  
    if (!isMobile) {
      document.head.innerHTML += `
        <style>
          body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
          }
  
          .mobile-only-wrapper {
            background: white;
            padding: 2rem 3rem;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
          }
  
          .mobile-only-wrapper h3 {
            color: #ff3e3e;
            margin-bottom: 0.5rem;
          }
  
          .mobile-only-wrapper p {
            color: #333;
          }
        </style>
      `;
  
      document.body.innerHTML = `
        <div class="mobile-only-wrapper">
          <h3>Mobile Device Required</h3>
          <p>This app is only accessible on smartphones or tablets.</p>
        </div>
      `;
    }
  </script>
  