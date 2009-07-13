BUILD_DIR=out
TARGET=$(BUILD_DIR)/index.php
SOURCES=$(wildcard src/shrew.php) \
$(wildcard src/main.php)

all:
	@mkdir -p $(BUILD_DIR)
	@rm -f $(TARGET)
	@touch $(TARGET)
	@cat $(SOURCES) >> $(TARGET)
	@echo "Build successful :" $(TARGET)
