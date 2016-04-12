<?php

// if(session_destroy())
// {
//     header('Location: URL');
// }

session_destroy();

header('Location: URL');
exit;