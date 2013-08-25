class AddEscapeToSettings < ActiveRecord::Migration
  def change
    add_column :settings, :escape, :boolean
  end
end
