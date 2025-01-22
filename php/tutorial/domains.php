<?php
$pageTitle = 'Tutorial - PHP';

// Start output buffering
ob_start();
?>
<?php
$domains = [
    ['name' => 'google.com', 'create' => '1997-09-15'],
    ['name' => 'youtube.com', 'create' => '2005-02-14'],
    ['name' => 'facebook.com', 'create' => '2004-02-04'],
    ['name' => 'kooora.com', 'create' => '2010-03-01'],
    ['name' => 'instagram.com', 'create' => '2010-10-06'],
    ['name' => 'chatgpt.com', 'create' => '2022-11-30'],
    ['name' => 'playpoints.withgoogle.com', 'create' => '2020-11-10'],
    ['name' => 'whatsapp.com', 'create' => '2009-01-01'],
    ['name' => 'tiktok.com', 'create' => '2016-09-20'],
    ['name' => 'wikipedia.org', 'create' => '2001-01-15'],
    ['name' => 'bing.com', 'create' => '2009-06-03'],
    ['name' => 'playjp.withgoogle.com', 'create' => '2020-11-10'],
    ['name' => 'men.gov.ma', 'create' => '2011-01-01'],
    ['name' => 'hespress.com', 'create' => '2007-05-04'],
    ['name' => 'x.com', 'create' => '2020-07-08'],
    ['name' => 'topcinema.cam', 'create' => '2020-06-01'],
    ['name' => 'akhbarona.com', 'create' => '2014-11-01'],
    ['name' => 'konami.net', 'create' => '1998-04-01'],
    ['name' => 'egydead.center', 'create' => '2022-03-01'],
    ['name' => 'melbet-ma.com', 'create' => '2020-04-01'],
    ['name' => 'msn.com', 'create' => '1995-08-24'],
    ['name' => 'openai.com', 'create' => '2015-12-11'],
    ['name' => '3isk.biz', 'create' => '2020-01-01'],
    ['name' => 'twitter.com', 'create' => '2006-03-21'],
    ['name' => 'like-manga.net', 'create' => '2010-07-01'],
    ['name' => '3isk.icu', 'create' => '2021-01-01'],
    ['name' => 'bladi.net', 'create' => '2003-01-01'],
];
function calculate_age($create): int
{
    $create = DateTime::createFromFormat('Y-m-d', $create);
    $curr_date = new DateTime();
    $diff = $curr_date->diff($create);
    $curr_age = $diff->y;
    return $curr_age;
}
usort($domains, function ($a, $b) {
    // Extract TLDs
    $tldA = explode('.', $a['name']);
    $tldB = explode('.', $b['name']);

    // Use end() to get the last element of the TLD arrays
    return strcmp(end($tldA), end($tldB));
});
?>
<div class="container">
    <h2 class="pt-4">Domain Names</h2>
    <p class="mb-4 bd-callout bd-callout-warning">Sorted by TLDs</p>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Domain Name
                </th>
                <th scope="col">TLDs
                </th>
                <th scope="col">Age
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($domains as $domain) { ?>
                <tr>
                    <td>
                        <?php echo $domain['name']; ?>
                    </td>
                    <td>
                        <span class="badge text-bg-dark"><?php $parts = explode('.', $domain['name']);
                        echo end($parts); ?></span>
                    </td>
                    <td>
                        <?php echo calculate_age($domain['create']); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
// End output buffering and capture the output
$bodyContent = ob_get_clean();

// Include the base template with the captured content
include 'base.php';
?>