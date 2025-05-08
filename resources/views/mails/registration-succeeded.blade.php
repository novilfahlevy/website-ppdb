<div
    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; background-color: rgb(255, 255, 255); color: rgb(113, 128, 150); height: 100%; line-height: 1.4; margin: 0px; padding: 0px; width: 100%;">

    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; background-color: rgb(237, 242, 247); margin: 0px; padding: 0px; width: 100%;">
        <tbody>
            <tr>
                <td align="center"
                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; margin: 0px; padding: 0px; width: 100%;">
                        <tbody>
                            <tr>
                                <td
                                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; padding: 25px 0px; text-align: center;">
                                    <a href="{{ url('/') }}"
                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; color: rgb(61, 72, 82); font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;"
                                        target="_blank">
                                        <img alt="{{ config('app.name') }} Logo" src="{{ asset('assets/logo.png') }}"
                                            style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; max-width: 100%; border: none; height: 75px; max-height: 75px; width: 75px;">
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td width="100%" cellpadding="0" cellspacing="0"
                                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; background-color: rgb(237, 242, 247); margin: 0px; padding: 0px; width: 100%; border: hidden;">
                                    <table class="inner-body" align="center" width="570" cellpadding="0"
                                        cellspacing="0" role="presentation"
                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; background-color: rgb(255, 255, 255); border-color: rgb(232, 229, 239); border-radius: 2px; border-width: 1px; margin: 0px auto; padding: 0px; width: 570px;">

                                        <tbody>
                                            <tr>
                                                <td
                                                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; max-width: 100vw; padding: 32px;">
                                                    <h1
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; color: rgb(61, 72, 82); font-size: 18px; font-weight: bold; margin-top: 0px; text-align: left;">
                                                        Selamat {{ $application->full_name }}! Pendaftaran Anda Berhasil</h1>
                                                    <p
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 16px; line-height: 1.5em; margin-top: 0px; text-align: left;">
                                                        Terima kasih telah mendaftar di {{ config('app.name') }}. Kami
                                                        dengan
                                                        senang hati mengonfirmasi bahwa pendaftaran Anda telah berhasil
                                                        diterima dan diproses.
                                                    </p>

                                                    <div style="background-color: #f8f9fa; border-radius: 4px; padding: 16px; margin: 20px 0; border-left: 4px solid #2d3748;">
                                                        <h3 style="color: rgb(61, 72, 82); font-size: 16px; margin-top: 0; margin-bottom: 10px;">Detail Pendaftaran:</h3>
                                                        <p style="margin: 0 0 8px 0;"><strong>Nama:</strong> {{ $application->full_name }}</p>
                                                        <p style="margin: 0 0 8px 0;"><strong>NISN:</strong> {{ $application->nisn }}</p>
                                                        <p style="margin: 0 0 8px 0;"><strong>Asal Sekolah:</strong> {{ $application->previous_school_name }}</p>
                                                        <p style="margin: 0;"><strong>Tanggal Pendaftaran:</strong> {{ $application->created_at->translatedFormat('l, d F Y H:i') }}</p>
                                                    </div>

                                                    <p
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 16px; line-height: 1.5em; margin-top: 0px; text-align: left;">
                                                        Simpan informasi ini untuk keperluan komunikasi dan proses selanjutnya.
                                                    </p>

                                                    <h2
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; color: rgb(61, 72, 82); font-size: 16px; font-weight: bold; margin-top: 20px; text-align: left;">
                                                        Kontak Informasi</h2>
                                                    <p
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 16px; line-height: 1.5em; margin-top: 0px; text-align: left;">
                                                        Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan
                                                        hubungi kami melalui:
                                                    </p>
                                                    <ul style="margin-top: 10px; padding-left: 20px;">
                                                        <li style="margin-bottom: 8px;">WhatsApp: <strong>0812 1270 3059
                                                                (Nana)</strong></li>
                                                        <li style="margin-bottom: 8px;">Telepon: <strong>0274 4469287
                                                                (IMKA)</strong></li>
                                                    </ul>
                                                    <p
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 16px; line-height: 1.5em; margin-top: 20px; text-align: left;">
                                                        Silakan menghubungi Tim Pendaftaran kami melalui kontak di atas
                                                        untuk mendapatkan informasi lebih lanjut.
                                                    </p>
                                                    <p
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 16px; line-height: 1.5em; margin-top: 20px; text-align: left;">
                                                        Salam,<br>
                                                        {{ config('app.name') }}</p>

                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                        role="presentation"
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; border-top: 1px solid rgb(232, 229, 239); margin-top: 25px; padding-top: 25px;">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                                                    <p
                                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; line-height: 1.5em; margin-top: 0px; text-align: left; font-size: 14px; color: rgb(113, 128, 150);">
                                                                        Ini adalah email otomatis. Mohon jangan membalas
                                                                        email ini.
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td
                                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">
                                    <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                        role="presentation"
                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; margin: 0px auto; padding: 0px; text-align: center; width: 570px;">
                                        <tbody>
                                            <tr>
                                                <td align="center"
                                                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; max-width: 100vw; padding: 32px;">
                                                    <p
                                                        style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; line-height: 1.5em; margin-top: 0px; color: rgb(176, 173, 197); font-size: 12px; text-align: center;">
                                                        © {{ date('Y') }} {{ config('app.name') }}.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
