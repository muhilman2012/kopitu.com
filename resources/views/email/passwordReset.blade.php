<!DOCTYPE html>
<html>

<head>
    <title>verifikasi@kopitu.com</title>
</head>

<body>

    <div
        style="box-sizing:border-box;margin:0;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;font-size:1rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff;width:100%!important">

        <div
            style="background-color:#ee9005;box-sizing:border-box;width:100%;padding-right:15px;padding-left:15px;padding-top:.5rem!important;padding-bottom:.5rem!important">

            <div style="box-sizing:border-box;display:block!important">
                <h2
                    style="box-sizing:border-box;margin-top:0;margin-bottom:.5rem;line-height:1.2;font-size:2rem;page-break-after:avoid;margin:0!important;padding-top:1.5rem!important;color:#ffc107!important">
                    <span>Kopitu</span><span> E-Store</span>
                </h2>
                <p
                    style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;display:block!important;margin:0!important;color:#fff!important">
                    Selamat datang di kopitu e-store</p>
                <hr
                    style="box-sizing:content-box;height:0;overflow:visible;margin-top:1rem;margin-bottom:.5rem!important;border:0;border-top:1px solid rgba(0,0,0,.1);background-color:#fff!important">
            </div>


            <div
                style="box-sizing:border-box;background-color:#fff!important;display:block!important;padding:1rem!important">

                <div style="box-sizing:border-box;display:block!important">
                    <p style="box-sizing:border-box;margin-top:0;margin-bottom:1rem!important;display:block!important">
                        Hallo {{ $details['username'] }},
                    </p>
                    <p style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;display:block!important">
                        Terima kasih telah mendaftar di <span class="il">Kopitu e-store</span>. Berikut adalah
                        detail akun Anda, pastikan Anda menyimpannya dengan aman.
                    </p>
                </div>

                <div style="box-sizing:border-box;display:block!important">
                    <hr
                        style="box-sizing:content-box;height:0;overflow:visible;margin-top:1rem;margin-bottom:1rem;border:0;border-top:1px solid rgba(0,0,0,.1)">
                    <div style="box-sizing:border-box;display:flex!important;margin-bottom:.5rem!important">
                        <p
                            style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;display:inline-block;margin:0!important;width:120px!important">
                            Username <span style="box-sizing:border-box;float:right!important">:</span></p>
                        <span style="box-sizing:border-box;margin-left:.25rem!important">{{ $details['username']
                            }}</span>
                    </div>
                    <div style="box-sizing:border-box;display:flex!important;margin-bottom:.5rem!important">
                        <p
                            style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;display:inline-block;margin:0!important;width:120px!important">
                            Alamat Email <span style="box-sizing:border-box;float:right!important">:</span></p>
                        <span style="box-sizing:border-box;margin-left:.25rem!important"><a
                                href="mailto:{{ $details['email'] }}" target="_blank"> {{ $details['email']
                                }}</a></span>
                    </div>
                    <hr
                        style="box-sizing:content-box;height:0;overflow:visible;margin-top:1rem;margin-bottom:1rem;border:0;border-top:1px solid rgba(0,0,0,.1)">
                </div>
                <div style="box-sizing:border-box;display:block!important">
                    Pastikan anda melakukan aktivasi akun, harap lakukan aktivasi dengan mengklik tombol di bawah ini:
                </div>

                <div
                    style="box-sizing:border-box;display:block!important;margin-top:3rem!important;margin-bottom:3rem!important;text-align:center!important">
                    <a href="https://kopitu.com/password/reset/akun/{{ $details['key'] }}"
                        style="box-sizing:border-box;color:white;text-decoration:none!important;background-color:#ee9005;padding-top:16px;padding-bottom:16px;padding-left:24px;padding-right:24px;font-size:20px;border-radius:4px"
                        target="_blank">Aktivasi Akun</a>
                </div>
                <div style="box-sizing:border-box;display:block!important;margin-bottom:1.5rem!important">
                    <div
                        style="border:1px solid #ee9005;box-sizing:border-box;display:flex;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border-radius:.25rem;margin-bottom:1rem!important">
                        <div style="box-sizing:border-box;min-height:1px;padding:1.25rem;color:#343a40!important">
                            <strong style="box-sizing:border-box;font-weight:bolder">Jika tombol tidak berfungsi, salin
                                tautan berikut ini</strong>
                            <br style="box-sizing:border-box">
                            <a href="https://kopitu.com/password/reset/akun/{{ $details['key'] }}"
                                style="box-sizing:border-box;color:#007bff;text-decoration:underline;background-color:transparent"
                                target="_blank">
                                https://kopitu.com/password/reset/akun/{{ $details['key'] }}
                            </a>
                        </div>
                    </div>
                </div>
                <div style="box-sizing:border-box;display:block!important">
                    <p style="box-sizing:border-box;margin-top:0;margin-bottom:.5rem!important;display:block!important">
                        Harap lakukan reset akun anda dalam tempo 24 jam, jika tidak melakukan reset password maka
                        anda harus validasi kembali akun email anda.
                    </p>
                    <p style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;display:block!important">
                        <strong style="box-sizing:border-box;font-weight:bolder">Catatan :</strong> Jika email ini masuk
                        di folder Spam, harap tandai sebagai bukan Spam dan tambahkan alamat email ini ke kontak Anda.
                    </p>
                </div>
            </div>


            <div style="box-sizing:border-box;display:block!important">
                <hr
                    style="box-sizing:content-box;height:0;overflow:visible;margin-top:.5rem!important;margin-bottom:1rem;border:0;border-top:1px solid rgba(0,0,0,.1);background-color:#fff!important">
                <div
                    style="box-sizing:border-box;display:block!important;padding-top:.5rem!important;text-align:center!important;color:#fff!important">
                    <small style="box-sizing:border-box;font-size:80%;font-weight:400">Anda menerima pesan ini sebagai
                        reset password akun kopitu e-store.</small>
                </div>
                <div
                    style="box-sizing:border-box;display:block!important;padding-bottom:1.5rem!important;text-align:center!important;color:#fff!important">
                    <small style="box-sizing:border-box;font-size:80%;font-weight:400">
                        © 2022 <span>Kopitu e-store</span>, jakarta.
                    </small>
                </div>
            </div>


        </div>
    </div>
</body>

</html>