BUILD_DIR=out
TARGET=$(BUILD_DIR)/index.php
PHP_PREFIX="<?php"
PHP_SUFFIX="?>"

SOURCES=\
$(wildcard src/licence.php) \
$(wildcard src/config.php) \
$(wildcard src/login_manager.php) \
$(wildcard src/image_manager.php) \
$(wildcard src/display_manager.php) \
$(wildcard src/shrew.php) \
$(wildcard src/main.php)

all:
	@mkdir -p $(BUILD_DIR)
	@rm -f $(TARGET) $(BUILD_DIR)/shrew-gallery.tar.gz
	@touch $(TARGET)
	@echo $(PHP_PREFIX) >> $(TARGET)
	@cat $(SOURCES) |grep -v "<?php" | grep -v "?>" | grep -v "//l" >> $(TARGET)
	@echo $(PHP_SUFFIX) >> $(TARGET)
	tar czf $(BUILD_DIR)/shrew-gallery.tar.gz  $(TARGET)
	@echo "Build successful :" $(TARGET)
