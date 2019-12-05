<div class="breadcrumb">
    <?php
    for ($i = 0; $i < sizeof($breadcrumb); $i++) {
        $active = ($i == sizeof($breadcrumb) - 1 || $breadcrumb[$i]['url'] == '#') ? 'active' : '';
        $name = $breadcrumb[$i]['name'];

        switch ($name) {
            case 'Home':
                $name = 'Beranda';
                break;
            case 'About':
                $name = 'Tentang Kami';
                break;
            case 'Services':
                $name = 'Pelayanan';
                break;
            case 'Gallery':
                $name = 'Galeri';
                break;
            case 'Contact':
                $name = 'Kontak Kami';
                break;
            case 'Signin':
                $name = 'Masuk';
                break;
            default:
                $name;
        }

        if ($active) {
            echo "<li>$name</li>";
        } else {
            $url = $breadcrumb[$i]['url'];
            echo "<li class='$active'><a href='$url'>$name</a></li>";
        }
    }
    ?>
</div>