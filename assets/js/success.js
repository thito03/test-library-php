const params = new URLSearchParams(window.location.search);
        if (params.get('success') === '1') {
            alert('anda terdaftar, silahkan login!');
        }