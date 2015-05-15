<div
    role="tabpanel"
    class="tab-pane session-pane <?php echo($session['token'] == $token ? 'active' : ''); ?>"
    id="<?php echo 'session_' . $key; ?>"
    >


    <ul class="nav nav-tabs category-tabs" role="tablist">
        <li role="presentation" class="active">
            <a
                href="#<?php echo 'links_' . $key; ?>"
                aria-controls="<?php echo 'links_' . $key; ?>"
                role="tab"
                data-toggle="tab">
                Links
            </a>
        </li>
        <li role="presentation">
            <a
                href="#<?php echo 'pics_' . $key; ?>"
                aria-controls="<?php echo 'pics_' . $key; ?>"
                role="tab"
                data-toggle="tab">
                Pics
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div
            role="tabpanel"
            class="tab-pane content-pane active"
            id="<?php echo 'links_' . $key; ?>"
            >
            <?php
            echo view(
                'ff-addon/links_tab',
                [
                    'session'    => $session,
                    'links_type' => 'links',
                ]
            );
            ?>
        </div>

        <div
            role="tabpanel"
            class="tab-pane content-pane"
            id="<?php echo 'pics_' . $key; ?>"
            >
            <?php
            echo view(
                'ff-addon/links_tab',
                [
                    'session'    => $session,
                    'links_type' => 'pics',
                ]
            );
            ?>
        </div>

    </div>


</div>