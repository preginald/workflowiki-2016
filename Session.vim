let SessionLoad = 1
if &cp | set nocp | endif
let s:so_save = &so | let s:siso_save = &siso | set so=0 siso=0
let v:this_session=expand("<sfile>:p")
silent only
cd ~/Dev/workflowiki.dev
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
set shortmess=aoO
badd +21 resources/views/events/create.blade.php
badd +1 mac
badd +54 resources/views/processes/show.blade.php
badd +8 resources/views/activities/create.blade.php
badd +42 routes/web.php
badd +37 app/Http/Controllers/NodeActivityController.php
badd +6 resources/views/activities/show.blade.php
badd +56 app/Http/Controllers/ActivityController.php
badd +78 app/Http/Controllers/ProcessController.php
badd +17 app/Http/Controllers/GateController.php
badd +2 vendor/symfony/console/Event/ConsoleEvent.php
badd +47 app/Http/Controllers/EventController.php
badd +1 vendor/laravel/framework/src/Illuminate/Broadcasting/PrivateChannel.php
badd +67 app/Node.php
badd +788 vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php
badd +16 resources/views/nodes/partials/buttons.blade.php
badd +19 database/migrations/2016_10_31_105127_create_gates_table.php
badd +17 database/migrations/2016_10_31_110105_create_gate_options_table.php
badd +17 resources/views/gates/create.blade.php
badd +13 app/Activity.php
badd +30 app/Http/Requests/GateOptionRequest.php
badd +1 app/Http/Requests/EventRequest.php
badd +27 app/Http/Requests/ProcessRequest.php
badd +19 database/migrations/2016_10_28_051607_create_events_table.php
badd +19 database/migrations/2016_10_28_092346_create_activities_table.php
badd +24 app/Branch.php
badd +22 database/migrations/2016_10_28_050030_create_nodes_table.php
badd +19 database/migrations/2016_11_04_043846_create_branches_table.php
badd +33 app/Process.php
badd +1 app/Http/Controllers/GateOptionController.php
badd +1 ~/.vim_runtime/my_configs.vim
badd +26 app/Http/Controllers/GateActivityController.php
badd +2 resources/views/nodes/panelb.blade.php
badd +1 resources/views/nodes/panel.blade.php
badd +26 resources/views/nodes/panel-backup.blade.php
badd +2 resources/views/nodes/branch.blade.php
badd +1 \'/home/preginald/Dev/workflowiki.dev/app/Http/Controllers/OptionActivityController.php\'
badd +45 app/Http/Controllers/OptionActivityController.php
badd +14 resources/views/activities/link.blade.php
badd +1 resources/views/nodes/branches/endactivity.blade.php
badd +14 app/GateOption.php
badd +41 resources/views/processes/show_v2.blade.php
badd +1 app/Gate.php
badd +1 resources/views/nodes/branch_v2.blade.php
badd +1 resources/views/panels/events/start.blade.php
badd +2 resources/views/panels/branch.blade.php
badd +36 resources/views/processes/show_v1.blade.php
badd +1 ~/buffer
badd +11 resources/views/panels/options.blade.php
badd +1 ~/Documents/telstra.txt
badd +0 ~/Documents/telstranew.txt
argglobal
silent! argdel *
argadd mac
edit app/Http/Controllers/ProcessController.php
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
set nosplitbelow
set nosplitright
wincmd t
set winheight=1 winwidth=1
exe 'vert 1resize ' . ((&columns * 118 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 119 + 119) / 238)
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal nofen
silent! normal! zE
let s:l = 78 - ((24 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
78
normal! 0
wincmd w
argglobal
edit app/Http/Controllers/GateOptionController.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 103 - ((27 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
103
normal! 09|
wincmd w
exe 'vert 1resize ' . ((&columns * 118 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 119 + 119) / 238)
tabedit resources/views/processes/show_v2.blade.php
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
set nosplitbelow
set nosplitright
wincmd t
set winheight=1 winwidth=1
exe 'vert 1resize ' . ((&columns * 118 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 119 + 119) / 238)
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 41 - ((19 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
41
normal! 095|
wincmd w
argglobal
edit resources/views/nodes/partials/buttons.blade.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 15 - ((14 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
15
normal! 0
wincmd w
exe 'vert 1resize ' . ((&columns * 118 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 119 + 119) / 238)
tabedit ~/Documents/telstranew.txt
set splitbelow splitright
set nosplitbelow
set nosplitright
wincmd t
set winheight=1 winwidth=1
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 1 - ((0 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
1
normal! 0
tabedit app/Node.php
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
set nosplitbelow
set nosplitright
wincmd t
set winheight=1 winwidth=1
exe 'vert 1resize ' . ((&columns * 119 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 118 + 119) / 238)
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 67 - ((29 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
67
normal! 0
wincmd w
argglobal
edit app/Gate.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 15 - ((12 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
15
normal! 05|
wincmd w
exe 'vert 1resize ' . ((&columns * 119 + 119) / 238)
exe 'vert 2resize ' . ((&columns * 118 + 119) / 238)
tabedit database/migrations/2016_11_04_043846_create_branches_table.php
set splitbelow splitright
set nosplitbelow
set nosplitright
wincmd t
set winheight=1 winwidth=1
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 20 - ((15 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
20
normal! 062|
tabedit routes/web.php
set splitbelow splitright
set nosplitbelow
set nosplitright
wincmd t
set winheight=1 winwidth=1
argglobal
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=0
setlocal fml=1
setlocal fdn=20
setlocal fen
silent! normal! zE
let s:l = 47 - ((22 * winheight(0) + 18) / 36)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
47
normal! 055|
tabnext 3
if exists('s:wipebuf')
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20 shortmess=filnxtToO
let s:sx = expand("<sfile>:p:r")."x.vim"
if file_readable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &so = s:so_save | let &siso = s:siso_save
let g:this_session = v:this_session
let g:this_obsession = v:this_session
let g:this_obsession_status = 2
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
