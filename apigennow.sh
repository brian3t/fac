rm -rf ./web/docs
apigen generate -s ./controllers,./rop,./mp -d ./web/docs --template-theme "bootstrap"
