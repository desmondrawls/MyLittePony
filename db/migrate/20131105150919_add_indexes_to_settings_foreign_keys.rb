class AddIndexesToSettingsForeignKeys < ActiveRecord::Migration
  def change
    add_index :settings, :north
    add_index :settings, :south
    add_index :settings, :west
    add_index :settings, :east
  end
end
