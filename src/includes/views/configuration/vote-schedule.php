<link rel="stylesheet" href="src/styles/config-election-schedule.css?v=2">

<main class="main">
    <div class="container px-md-3 px-lg-5 px-sm-2">
        <?php include_once 'configuration-page-title.php'; ?>
        <div class=" ">

            <?php
            global $requested_basepage;
            $route_link;
            if (isset($requested_basepage) && !empty($requested_basepage)) {
                $route_link = $requested_basepage;
            } else {
                $route_link = true;
            }
            global $configuration_pages;
            global $link_name;
            $secondary_nav = new SecondaryNav($configuration_pages, $link_name,  $route_link);
            $secondary_nav->getNavLink();
            ?>
        </div>
        <table id="example" class="table table-hover card-box" style="width: 100%;">
            <thead>
                <tr class="">
                    <th></th>
                    <th>Section</th>
                    <th>Schedule</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $org_name;
                $org_name = strtoupper($org_name);
                for ($i = 0; $i < 6; ++$i) {
                    echo "
                        <tr class=\"\">
                            <td></td>
                            <td>
                            " . (isset($org_name) ? $org_name : "Section") . rand(1, 5) . "-" . rand(1, 3) . "
                            </td>
                            <td>Schedule$i</td>
                        </tr>
                    ";
                }

                ?>



            </tbody>

        </table>



    </div>
</main>
<?php
global $page_scripts;
$page_scripts = '
<script  type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script  type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
<script  type="text/javascript" src="https://cdn.datatables.net/select/2.0.1/js/dataTables.select.js"></script>
<script  type="text/javascript" src=" https://cdn.datatables.net/select/2.0.1/js/select.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
<script  type="module" src="src/scripts/config-election-schedule.js?v=2"></script>
<script  type="text/javascript"src="src/scripts/feather.js" defer></script>
    ';
