@echo off
start C:\wamp64.2\wampmanager.exe
timeout 15 /nobreak
start http://localhost/StoreFreeze3/StoreFreezeSimple/public/index
exit