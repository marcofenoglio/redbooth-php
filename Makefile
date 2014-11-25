vendor/autoload.php:
	composer install

.PHONY: sniff
sniff: vendor/autoload.php
	vendor/bin/phpcs --standard=PSR2 src -n

.PHONY: test
test: vendor/autoload.php
	vendor/bin/phpunit

.PHONY: doc
doc: vendor/autoload.php
	mkdir -p doc && \
	vendor/bin/phpdoc -d src -t doc --template="xml" && \
	rm -r doc/phpdoc-cache-* && \
	vendor/bin/phpdocmd doc/structure.xml doc