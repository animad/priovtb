<?die;?>

; F2SV - fields to save
user_f2sv[uid]:
user_f2sv[on]:
user_f2sv[login]:
user_f2sv[passw]:
user_f2sv[status]:
user_f2sv[mallow]:
user_f2sv[name]:
user_f2sv[surname]:
user_f2sv[nickname]:
user_f2sv[showname]:
user_f2sv[email]:
user_f2sv[site_url]:
user_f2sv[ftp_host]:
user_f2sv[ftp_ssl]:
user_f2sv[ftp_user]:
user_f2sv[ftp_pass]:
user_f2sv[ftp_rdir]:

; FNAME - human like fields name
user_fname[uid]:���
user_fname[on]:�������
user_fname[login]:�����
user_fname[passw]:������
user_fname[passw2]:������ (���������)
user_fname[status]:������
user_fname[name]:���
user_fname[surname]:�������
user_fname[nickname]:���������
user_fname[showname]:������������ ���
user_fname[email]:�����
user_fname[site_url]:����

; FSHOW - allow to view field in EDIT MODE
; show - field visible
; hide - field invisible but value is present
; blank - visible but set blank value
user_fshow[fln]:hide
user_fshow[uid]:show
user_fshow[on]:show
user_fshow[login]:show
user_fshow[passw]:blank
user_fshow[passw2]:blank
user_fshow[status]:show
user_fshow[mallow]:hide
user_fshow[name]:show
user_fshow[surname]:show
user_fshow[nickname]:show
user_fshow[showname]:show
user_fshow[email]:show
user_fshow[site_url]:show
user_fshow[ftp_host]:hide
user_fshow[ftp_ssl]:hide
user_fshow[ftp_user]:hide
user_fshow[ftp_pass]:hide
user_fshow[ftp_rdir]:hide

; FRO - Field Read Only
; 100 - info
; 010 - edit
; 001 - create
user_fro[fln]:100
user_fro[uid]:101
user_fro[on]:101
user_fro[login]:100
user_fro[passw]:100
user_fro[passw2]:100
user_fro[status]:100
user_fro[name]:100
user_fro[surname]:100
user_fro[nickname]:100
user_fro[showname]:100
user_fro[email]:100
user_fro[site_url]:100
user_fro[ftp_host]:111
user_fro[ftp_ssl]:111
user_fro[ftp_user]:111
user_fro[ftp_pass]:111
user_fro[ftp_rdir]:111

; FHLP - 
user_fhlp[on]:1/0
user_fhlp[status]:admin/user
user_fhlp[email]:xx@xx.xx

; FDEF - default values of fields
user_fdef[on]:0
user_fdef[status]:user

; FCONFR - fields needs confirmations
user_fconfr[passw]:passw2

