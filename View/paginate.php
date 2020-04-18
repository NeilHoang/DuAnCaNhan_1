<nav class="content-center">
    <ul class="pagination justify-content-center">
        <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li class="page-item <?php if ($current_page == $i): ?>active<?php endif; ?>">
                <?php if ($current_page == $i){ ?>
                    <span class="page-link">
                <?php echo $i ?>
                <span class="sr-only">(current)</span>
            </span>
                <?php }else { ?>
                    <a class="page-link" href="homepage.php?page=listProduct&pageNumber=<?php echo $i ?>"><?php echo $i ?></a>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
</nav>