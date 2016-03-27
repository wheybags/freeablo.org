Replace your topic icons and smiles with the files from contrib directory.

=================================================================

Rename
khaki_black/imageset/en

to
khaki_black/imageset/default_board_language

=================================================================

To switch profiles from right side to left side:

rename
khaki_black/theme/content.css

to
khaki_black/theme/content-profiles-on-right.css

rename
khaki_black/theme/content-profiles-on-left.css

to
khaki_black/theme/content.css

Refresh your themes.

================================================================
If you use the mChat MOD:

open
khaki_black/template/overall_header.html

find and remove

<script type="text/javascript" src="{ROOT_PATH}mchat/jquery_core_mini.js"></script>
