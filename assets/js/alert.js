const params = new URLSearchParams(window.location.search);
        if (params.get('error') === '1') {
            alert('Username atau password salah!');
        }