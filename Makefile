BUILD_DIR=out
TARGET=$(BUILD_DIR)/index.php
SOURCES=\
$(wildcard src/licence.php) \
$(wildcard src/shrew.php) \
$(wildcard src/main.php)
PHP_PREFIX="<?php"
PHP_SUFFIX="?>"

all:
	@mkdir -p $(BUILD_DIR)
	@rm -f $(TARGET)
	@touch $(TARGET)
	@echo $(PHP_PREFIX) >> $(TARGET)
	@cat $(SOURCES) |grep -v "<?php" | grep -v "?>" | grep -v "//l" >> $(TARGET)
	
	@echo $(PHP_SUFFIX) >> $(TARGET)
	@echo "Build successful :" $(TARGET)
