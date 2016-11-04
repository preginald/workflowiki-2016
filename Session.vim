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
badd +11 resources/views/events/create.blade.php
badd +1 mac
badd +19 resources/views/processes/show.blade.php
badd +14 resources/views/activities/create.blade.php
badd +45 routes/web.php
badd +1 app/Http/Controllers/NodeActivityController.php
badd +4 resources/views/activities/show.blade.php
badd +57 app/Http/Controllers/ActivityController.php
badd +66 app/Http/Controllers/ProcessController.php
badd +31 app/Http/Controllers/GateController.php
badd +2 vendor/symfony/console/Event/ConsoleEvent.php
badd +68 app/Http/Controllers/EventController.php
badd +1 vendor/laravel/framework/src/Illuminate/Broadcasting/PrivateChannel.php
badd +51 app/Node.php
badd +788 vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php
badd +2 resources/views/nodes/panel.blade.php
badd +7 resources/views/nodes/partials/buttons.blade.php
badd +19 database/migrations/2016_10_31_105127_create_gates_table.php
badd +17 database/migrations/2016_10_31_110105_create_gate_options_table.php
badd +19 resources/views/gates/create.blade.php
badd +13 app/Activity.php
badd +30 app/Http/Requests/GateOptionRequest.php
badd +1 app/Http/Requests/EventRequest.php
badd +27 app/Http/Requests/ProcessRequest.php
badd +19 database/migrations/2016_10_28_051607_create_events_table.php
badd +19 database/migrations/2016_10_28_092346_create_activities_table.php
argglobal
silent! argdel *
argadd mac
edit resources/views/nodes/panel.blade.php
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
let s:l = 2 - ((1 * winheight(0) + 22) / 44)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
2
normal! 062|
tabnext 1
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
